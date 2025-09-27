<div class="destination-search-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-form-container">
                    <form id="packageSearchForm" class="destination-search-form">
                        @csrf
                        <div class="row align-items-end">
                            <!-- Search Input -->
                            <div class="col-lg-5 col-md-6 col-12 mb-3">
                                <label for="search" class="form-label">Search Packages</label>
                                <div class="search-input-group">
                                    <input
                                        type="text"
                                        name="search"
                                        id="search"
                                        class="form-control search-input"
                                        placeholder="Search by title or description..."
                                        value=""
                                    >
                                    <i class="fas fa-search search-icon"></i>
                                </div>
                            </div>

                            <!-- Location Filter -->
                            <div class="col-lg-4 col-md-6 col-12 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <select name="location" id="location" class="form-select filter-select">
                                    <option value="">All Locations</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->location }}">
                                            {{ $location->location }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Search Buttons -->
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <div class="search-buttons d-flex gap-2">
                                    <button type="submit" class="btn btn-primary search-btn flex-fill position-relative">
                                        <i class="fas fa-search d-md-none"></i>
                                        <span class="d-none d-md-inline">Search</span>
                                        <span class="d-md-none">Find</span>
                                        <span class="btn-loading">
                                            <i class="fas fa-spinner fa-spin"></i>
                                        </span>
                                    </button>
                                    <button type="button" id="clearFilters" class="btn btn-outline-secondary clear-btn flex-fill">
                                        <i class="fas fa-times d-md-none"></i>
                                        <span class="d-none d-md-inline">Clear</span>
                                        <span class="d-md-none">Reset</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Search Results Info -->
                        <div class="search-results-info d-none">
                            <div class="alert alert-info mb-0">
                                <i class="fas fa-info-circle"></i>
                                <strong>Search Results:</strong>
                                <span id="searchResultsText"></span>
                                <button type="button" id="clearAllFiltersInline" class="float-end text-decoration-none btn-link border-0 bg-transparent p-0">
                                    <small>Clear all filters</small>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>