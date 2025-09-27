@extends('layouts.frontend')
@section('title', "Book Sri Lanka Travel Packages | Tailored Tours with Traveling Ceylon")
@section('meta_description', 'Explore customized travel packages for Sri Lanka. Book your dream vacation with tailored tours, including sightseeing, accommodations, and more with Traveling Ceylon.')
@section('meta_keywords', 'Sri Lanka travel packages, Sri Lanka tour packages, customized travel tours, Sri Lanka vacation packages, Sri Lanka group tours, Sri Lanka travel deals, Traveling Ceylon packages, tailored travel Sri Lanka')
@section('content')

      <div id="page" class="page">


        @include('frontend.components.header')

         <main id="content" class="site-main">
            <section class="destination-inner-page">
            @section('single_page_img', asset('frontend/assets/images/merlin.jpg'))
            @section('single_page_name', 'Packages')
            @include('frontend.components.inner_banner')

            @include('frontend.components.package_search')

            <div class="package-item-wrap">
                <div class="container">
                    <div id="packageResults">
                        @include('frontend.packages.single_with_pagination')
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-12">
                            <div class="pagination-wrap d-flex justify-content-center mt-5" id="paginationContainer">
                                {{ $packages->links('frontend.components.pagination', ['itemType' => 'packages']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('frontend.components.discount')
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
    $('#packageSearchForm').on('submit', function(e) {
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
            console.log('Pagination URL clicked:', url);

            try {
                let page = new URL(url).searchParams.get('page') || 1;
                currentPage = parseInt(page);
                console.log('Going to page:', currentPage);
                performSearch();
            } catch (error) {
                console.error('Error parsing pagination URL:', error);
                // Fallback: extract page number from URL using regex
                let match = url.match(/[?&]page=(\d+)/);
                if (match) {
                    currentPage = parseInt(match[1]);
                    console.log('Fallback: Going to page:', currentPage);
                    performSearch();
                }
            }
        }
    });

    function performSearch() {
        if (isLoading) return;

        isLoading = true;
        showLoading();

        let formData = {
            search: $('#search').val(),
            location: $('#location').val(),
            page: currentPage,
            _token: csrfToken
        };

        $.ajax({
            url: '{{ route("packages.search") }}',
            method: 'POST',
            data: formData,
            dataType: 'json',
            timeout: 30000,
            success: function(response) {
                if (response.success) {
                    // Update results
                    $('#packageResults').html(response.html);
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
                } else if (xhr.status === 422) {
                    errorMessage = 'Invalid search parameters. Please check your input.';
                } else if (xhr.status === 500) {
                    errorMessage = 'Server error occurred. Please try again later.';
                    console.error('Server error details:', xhr.responseText);
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
        let hasFilters = formData.search || formData.location;

        if (hasFilters) {
            let resultText = '';
            if (formData.search) {
                resultText += `Searching for "<em>${formData.search}</em>"`;
            }
            if (formData.location) {
                resultText += ` in <em>${formData.location}</em>`;
            }

            $('#searchResultsText').html(resultText);
            $('.search-results-info').removeClass('d-none');
        } else {
            $('.search-results-info').addClass('d-none');
        }
    }

    function showLoading() {
        $('.search-btn').addClass('loading');
        $('.search-btn').prop('disabled', true);
    }

    function hideLoading() {
        $('.search-btn').removeClass('loading');
        $('.search-btn').prop('disabled', false);
    }

    function showErrorMessage(message = 'Something went wrong while searching. Please try again.') {
        $('#packageResults').html(`
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

        // Hide search results info
        $('.search-results-info').addClass('d-none');

        // Reset to page 1
        currentPage = 1;

        // Show all packages (reset to initial state)
        showAllPackages();
    }

    function showAllPackages() {
        if (isLoading) return;

        isLoading = true;
        showLoading();

        $.ajax({
            url: '{{ route("packages.search") }}',
            method: 'POST',
            data: {
                search: '',
                location: '',
                page: 1,
                _token: csrfToken
            },
            dataType: 'json',
            timeout: 30000,
            success: function(response) {
                if (response.success) {
                    // Update results
                    $('#packageResults').html(response.html);
                    $('#paginationContainer').html(response.pagination);

                    // Trigger any animations
                    triggerAnimations();
                }
            },
            error: function(xhr, status, error) {
                console.error('Clear filters error:', error);
                console.error('Response:', xhr.responseText);
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