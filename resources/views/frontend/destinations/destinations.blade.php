@extends('layouts.frontend')
@section('title', "Sri Lanka Travel Destinations | Discover Your Next Adventure with Traveling Ceylon")
@section('meta_description', 'Discover the best travel destinations in Sri Lanka. Explore beautiful beaches, cultural landmarks, and hidden gems with Traveling Ceylon for your perfect vacation.')
@section('meta_keywords', 'Sri Lanka travel destinations, explore Sri Lanka, Sri Lanka beach destinations, cultural landmarks Sri Lanka, Sri Lanka vacation, best destinations Sri Lanka, Traveling Ceylon destinations')

@section('content')

      <div id="page" class="page">


        @include('frontend.components.header')

         <main id="content" class="site-main">
            <section class="destination-inner-page">
            @section('single_page_img', asset('frontend/assets/images/DDD-Srilanka-1.jpg'))
            @section('single_page_name', 'Destinations')
            @include('frontend.components.inner_banner')

            @include('frontend.components.destination_search')

            <div class="destination-item-wrap">
               <div class="container">
                  <!-- Loading Overlay -->
                  <div id="loadingOverlay" class="loading-overlay d-none">
                     <div class="loading-spinner">
                        <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                        <p class="mt-2 text-muted">Searching destinations...</p>
                     </div>
                  </div>

                  <div class="row gx-5" id="destinationResults">
                     @include('frontend.destinations.single')
                  </div>

                  <!-- Pagination -->
                  <div class="row">
                     <div class="col-12">
                        <div class="pagination-wrap d-flex justify-content-center mt-5" id="paginationContainer">
                           {{ $destinations->links('frontend.components.pagination') }}
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="inner-counter">
            @include('frontend.components.inner_counter')
            </div>
            @include('frontend.destinations.counter_bg')
            </section>
         </main>




         @include('frontend.components.footer')
         @include('frontend.components.top')
         @include('frontend.components.owner')
      </div>

     @endsection

@push('scripts')
<script>
$(document).ready(function() {
    let currentPage = 1;
    let isLoading = false;

    // CSRF Token
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    if (!csrfToken) {
        console.error('CSRF token not found');
        return;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });

    // Search form submission - only trigger on button click
    $('#destinationSearchForm').on('submit', function(e) {
        e.preventDefault();
        if (!isLoading) {
            currentPage = 1;
            performSearch();
        }
    });

    // Clear filters - reset without searching (using event delegation for dynamic content)
    $(document).on('click', '#clearFilters, #clearAllFiltersInline, #clearAllFilters', function() {
        clearAllFilters();
    });

    // Pagination click handler (using event delegation)
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        if (!isLoading) {
            let url = $(this).attr('href');
            let page = new URL(url).searchParams.get('page') || 1;
            currentPage = parseInt(page);
            performSearch();
        }
    });

    function performSearch() {
        if (isLoading) return;

        isLoading = true;
        showLoading();

        let formData = {
            search: $('#search').val(),
            location: $('#location').val(),
            category: $('#category').val(),
            page: currentPage,
            _token: csrfToken
        };

        $.ajax({
            url: '{{ route("destinations.search") }}',
            method: 'POST',
            data: formData,
            dataType: 'json',
            timeout: 30000,
            success: function(response) {
                if (response.success) {
                    // Update results
                    $('#destinationResults').html(response.html);
                    $('#paginationContainer').html(response.pagination);

                    // Update search results info
                    updateSearchResultsInfo(formData, response);

                    // Trigger any animations
                    triggerAnimations();
                }
            },
            error: function(xhr, status, error) {
                console.error('Search error:', {
                    status: xhr.status,
                    statusText: xhr.statusText,
                    responseText: xhr.responseText,
                    error: error
                });

                let errorMessage = 'Something went wrong while searching.';
                if (xhr.status === 419) {
                    errorMessage = 'Security token expired. Please refresh the page and try again.';
                } else if (xhr.status === 500) {
                    errorMessage = 'Server error occurred. Please try again later.';
                } else if (xhr.status === 0) {
                    errorMessage = 'Network error. Please check your connection.';
                }

                showErrorMessage(errorMessage);
            },
            complete: function() {
                hideLoading();
                isLoading = false;
            }
        });
    }

    function updateSearchResultsInfo(formData, response) {
        let hasFilters = formData.search || formData.location || formData.category;

        if (hasFilters) {
            let resultText = '';
            if (formData.search) {
                resultText += `Searching for "<em>${formData.search}</em>"`;
            }
            if (formData.location) {
                resultText += ` in <em>${formData.location}</em>`;
            }
            if (formData.category) {
                resultText += ` under <em>${formData.category}</em> category`;
            }

            $('#searchResultsText').html(resultText);
            $('.search-results-info').removeClass('d-none');
        } else {
            $('.search-results-info').addClass('d-none');
        }
    }

    function showLoading() {
        $('#loadingOverlay').removeClass('d-none');
        $('.search-btn .btn-loading').removeClass('d-none');
        $('.search-btn i:not(.btn-loading i)').addClass('d-none');
        $('.search-btn span:not(.btn-loading)').addClass('d-none');
    }

    function hideLoading() {
        $('#loadingOverlay').addClass('d-none');
        $('.search-btn .btn-loading').addClass('d-none');
        $('.search-btn i:not(.btn-loading i)').removeClass('d-none');
        $('.search-btn span:not(.btn-loading)').removeClass('d-none');
    }

    function showErrorMessage(message = 'Something went wrong while searching. Please try again.') {
        $('#destinationResults').html(`
            <div class="col-12">
                <div class="alert alert-danger text-center">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Oops!</strong> ${message}
                </div>
            </div>
        `);
    }

    function triggerAnimations() {
        // Trigger any scroll animations or effects
        $('[data-animscroll]').each(function(index) {
            $(this).css('animation-delay', (index * 100) + 'ms');
        });
    }

    function clearAllFilters() {
        // Reset form fields
        $('#search').val('');
        $('#location').val('');
        $('#category').val('');

        // Hide search results info
        $('.search-results-info').addClass('d-none');

        // Reset to page 1
        currentPage = 1;

        // Show all destinations (reset to initial state)
        showAllDestinations();
    }

    function showAllDestinations() {
        if (isLoading) return;

        isLoading = true;
        showLoading();

        $.ajax({
            url: '{{ route("destinations.search") }}',
            method: 'POST',
            data: {
                search: '',
                location: '',
                category: '',
                page: 1,
                _token: csrfToken
            },
            dataType: 'json',
            timeout: 30000,
            success: function(response) {
                if (response.success) {
                    // Update results
                    $('#destinationResults').html(response.html);
                    $('#paginationContainer').html(response.pagination);

                    // Trigger any animations
                    triggerAnimations();
                }
            },
            error: function(xhr, status, error) {
                console.error('Clear filters error:', error);
                showErrorMessage('Failed to reset filters. Please refresh the page.');
            },
            complete: function() {
                hideLoading();
                isLoading = false;
            }
        });
    }
});
</script>
@endpush