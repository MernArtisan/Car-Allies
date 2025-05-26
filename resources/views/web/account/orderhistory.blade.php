@extends('frontend.layouts.master')

@section('title', 'Account')

@section('content')
{{-- <x-innerbanner :key="6" /> --}}
    <section class="dashboard-sec instructor-grid">
        <div class="container">
            <div class="page-content dashboard">
                <div class="container">
                    <div class="row">

                        @include('frontend.includes.account-sidebar')


                        <div class="col-xl-9 col-lg-8 col-md-12">

                            <div class="sell-course-head">
                                <h3>Order History</h3>
                            </div>

                            <nav>
                                <div class="nav" id="nav-tab" role="tablist">
                                    <button class="green-btn active" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                        aria-selected="true">Today</button>
                                    <button class="nav-link blue-btn" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="false">Monthly</button>
                                    <button class="nav-link blue-btn" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-contact" type="button" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Yearly</button>

                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab" tabindex="0">
                                    <div class="tutor-table-wrapper">
                                        <table class="tutor-table tutor-table-responsive tutor-table-purchase-history">
                                            <tbody>
                                                <tr>
                                                    <td colspan="100%">
                                                        <div class="td-empty-state">
                                                            <div
                                                                class="tutor-empty-state td-empty-state tutor-p-32 tutor-text-center">
                                                                <img src="https://dreamslms-wp.dreamstechnologies.com/wp-content/plugins/tutor/assets/images/emptystate.svg"
                                                                    alt="No Data Available in this Section"
                                                                    width="85%">
                                                                <div
                                                                    class="tutor-fs-6 tutor-color-secondary tutor-text-center">
                                                                    No Data Available in this Section </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab" tabindex="0">
                                    2
                                </div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab" tabindex="0">
                                    3
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endSection
