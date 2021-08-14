<?php
 
  $db = mysqli_connect("localhost", "crm_shamil_40", "R7K9Rf943Tds3", "crm_shamil_40");


  $msg = "";


  $result = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs`");
  $closed_jobs = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Closed'");
  $in_progress = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Open'");
  $cancelled_jobs = mysqli_query($db, "SELECT COUNT(*) FROM `88888-jobs` WHERE status='Cancelled'");
  $row = mysqli_fetch_array($result);
  $row1 = mysqli_fetch_array($closed_jobs);
  $row2 = mysqli_fetch_array($in_progress);
  $row3 = mysqli_fetch_array($cancelled_jobs);

?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
    <title>Jobs</title>
    <script>window.App = {}</script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <script defer="defer" src="assets/js/iframe.js"></script>
    <link href="assets/css/iframe.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>

<body class="bg-light-blue">
    <div class="frame-content">
    	<input id="page_name" name="page_name" type="hidden" value="jobs">
    	<input id="account_id" name="account_id" type="hidden" value="account_id">
    	<input id="date_all_start" name="date_all_start" type="hidden" value="May 01, 2021">
    	<input id="date_all_end" name="date_all_start" type="hidden" value="May 19, 2021">
        <section class="dashboard">
            <div class="dashboard-item">
                <div class="dashboard-item-content">
                    <p class="dashboard-item-number"><?php echo $row['COUNT(*)'] ; ?></p>
                    <p class="dashboard-item-title">All Jobs</p>
                </div>
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item-content">
                    <p class="dashboard-item-number"><?php echo $row1['COUNT(*)'] ; ?></p>
                    <p class="dashboard-item-title">Closed</p>
                </div>
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item-content">
                    <p class="dashboard-item-number"><?php echo $row2['COUNT(*)'] ; ?></p>
                    <p class="dashboard-item-title">In progress</p>
                </div>
            </div>
            <div class="dashboard-item">
                <div class="dashboard-item-content">
                    <p class="dashboard-item-number"><?php echo $row3['COUNT(*)'] ; ?></p>
                    <p class="dashboard-item-title">Cancelled</p>
                </div>
            </div>
        </section>
        <div class="w-full px-15 py-25 sm:p-25 border-b border-gray text-sm sm:text-md text-dark-blue font-medium text-left">Jobs</div>
        <section class="flex flex-wrap md:flex-nowrap justify-center md:justify-between w-full border-b border-gray py-20 px-15 sm:px-25 mb-40">
            <div class="search hidden sm:block mb-25 md:mb-0" x-data="App.search()" x-init="init()"><input class="search-input" value="Test message">
                <div class="search-btn" @click="search()"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.1186 17.2581L15.1033 13.2428C15.9666 12.0397 16.4813 10.6217 16.5907 9.14499C16.7002 7.66823 16.4002 6.18991 15.7238 4.87264C15.0473 3.55537 14.0206 2.45021 12.7567 1.67875C11.4927 0.907283 10.0404 0.49941 8.5596 0.500001C6.42392 0.501027 4.376 1.34988 2.86584 2.86004C1.35568 4.3702 0.506832 6.41812 0.505806 8.5538C0.503824 10.0352 0.910842 11.4883 1.68201 12.7532C2.45317 14.018 3.55855 15.0453 4.87633 15.722C6.1941 16.3988 7.67312 16.6985 9.15039 16.5883C10.6277 16.4781 12.0458 15.9622 13.2486 15.0975L17.2639 19.1167C17.5104 19.3631 17.8447 19.5016 18.1932 19.5016C18.5418 19.5016 18.876 19.3631 19.1225 19.1167C19.369 18.8702 19.5074 18.5359 19.5074 18.1874C19.5074 17.8388 19.369 17.5046 19.1225 17.2581H19.1186ZM4.72243 12.3948C3.83664 11.5074 3.28591 10.3402 3.16404 9.09228C3.04218 7.84431 3.35671 6.5927 4.05407 5.55061C4.75142 4.50852 5.78848 3.74041 6.98859 3.37711C8.1887 3.01381 9.47765 3.07779 10.6359 3.55815C11.7941 4.0385 12.75 4.90553 13.3408 6.01156C13.9315 7.11758 14.1205 8.39419 13.8757 9.62395C13.6308 10.8537 12.9672 11.9606 11.9979 12.756C11.0286 13.5514 9.81351 13.9862 8.5596 13.9862C7.84657 13.9878 7.1403 13.8479 6.48167 13.5748C5.82303 13.3016 5.22509 12.9006 4.72243 12.3948Z" fill="#8391AD" /></svg></div>
            </div>
            <div class="w-full md:w-auto flex flex-wrap sm:flex-nowrap justify-end py-20 px-15 sm:p-0 border-b border-gray sm:border-b-0">
                <div class="flex items-center w-full sm:w-auto justify-end mb-15 sm:mb-0">
                    <div class="flex items-center relative sm:mr-25" x-data="App.dropdown()" x-init="init()" @click="dropdownActive = !dropdownActive" @click.away="dropdownActive = false">
                        <p class="mr-5 cursor-pointer" x-text="value"></p>
                        <div :class="{'transform rotate-180' : dropdownActive}"><svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.612244" y="0.0039978" width="10" height="1" rx="0.5" transform="rotate(37.7521 0.612244 0.0039978)" fill="black" />
                                <rect x="15.7245" y="0.791351" width="10" height="1" rx="0.5" transform="rotate(142.313 15.7245 0.791351)" fill="black" /></svg></div>
                        <div class="dropdown right-0 top-35" x-show="dropdownActive" x-cloak @click.stop="
									selectItem($event)
									$dispatch('set-date', value)">
                            <div class="dropdown-item dropdown-item-active">Custom</div>
                            <div class="dropdown-item">Tomorrow & Next</div>
                            <div class="dropdown-item">Tomorrow</div>
                            <div class="dropdown-item">Today</div>
                            <div class="dropdown-item">Yesterday</div>
                            <div class="dropdown-item">This week (Sun - today)</div>
                            <div class="dropdown-item">This week (Mon - today)</div>
                            <div class="dropdown-item">Last 7 days</div>
                            <div class="dropdown-item">Last week (Sun - Sat)</div>
                            <div class="dropdown-item">Last week (Mon - Sun)</div>
                            <div class="dropdown-item">Last business week (Mon - Fri)</div>
                            <div class="dropdown-item">Last 14 days</div>
                            <div class="dropdown-item">Last 30 days</div>
                            <div class="dropdown-item">This month</div>
                            <div class="dropdown-item">Last month</div>
                            <div class="dropdown-item">All</div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center relative mb-15 sm:mb-0 sm:mr-25" x-data="App.calendar()" x-init="init('May 20,2021', 'Jun 20,2021')" @set-date.window="setDate($event.detail)">
                    <div class="date-picker" @click="datePickerStartOpen()">
                        <p class="w-85 sm:w-95 pr-10 text-4xs sm:text-3xs" x-text="`${monthShortList[dateStart.getMonth()]} ${dateStart.getDate()}, ${dateStart.getFullYear()}`"></p><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.08046 2.22566V0H4.73441V2.22566H8.38961V0H10.0436V2.22566H13V16H0V2.22566H3.08046ZM11.7595 14.6857H1.24046V5.00332H11.7595V14.6857Z" fill="#8391AD" />
                            <path d="M5.54069 5.9978H2.46436V9.25739H5.54069V5.9978Z" fill="#8391AD" /></svg>
                    </div>
                    <p class="mx-10 sm:mx-25 text-gray-blue text-xs">to</p>
                    <div class="date-picker" @click="datePickerEndOpen()">
                        <p class="w-85 sm:w-95 pr-10 text-4xs sm:text-3xs" x-text="`${monthShortList[dateEnd.getMonth()]} ${dateEnd.getDate()}, ${dateEnd.getFullYear()}`"></p><svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.08046 2.22566V0H4.73441V2.22566H8.38961V0H10.0436V2.22566H13V16H0V2.22566H3.08046ZM11.7595 14.6857H1.24046V5.00332H11.7595V14.6857Z" fill="#8391AD" />
                            <path d="M5.54069 5.9978H2.46436V9.25739H5.54069V5.9978Z" fill="#8391AD" /></svg>
                    </div>
                    <div class="calendar" x-show="calendarActive" x-cloak @click.away="($event.target.closest('.date-picker') === null) && (calendarActive = false)">
                        <div class="flex items-center justify-between w-full py-15 border-b border-gray">
                            <div class="w-10" @click="prev()"><svg viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.22396 1L1.22742 6.07275L6.22396 11.1455" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                                </svg></div>
                            <p class="text-center text-2xs font-medium" x-text="`${monthList[month]} ${year}`"></p>
                            <div class="w-10" @click="next()"><svg viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.868389 11.1455L5.86493 6.07276L0.868388 1.00002" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                                </svg></div>
                        </div>
                        <table class="calendar-cells">
                            <tr class="border-b border-gray">
                                <td>s</td>
                                <td>m</td>
                                <td>t</td>
                                <td>w</td>
                                <td>t</td>
                                <td>f</td>
                                <td>s</td>
                            </tr>
                            <tr class="block pt-5"></tr>
                            <tr>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                            </tr>
                            <tr>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                            </tr>
                            <tr>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                            </tr>
                            <tr>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                            </tr>
                            <tr>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                            </tr>
                            <tr>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                                <td class="calendar-cell"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="reload-btn hidden sm:flex" x-data="{active: false}" :class="{'reload-btn-active' : active}" @dates-change.window="active = true" @click="$store.data.createJson('refresh')"><svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25474 3.4211C8.64019 2.94667 10.1419 2.92448 11.541 3.35776C12.94 3.79106 14.1632 4.65716 15.0321 5.82979C15.901 7.00243 16.3703 8.42026 16.3716 9.87658C16.3716 9.9023 16.3724 9.92791 16.3741 9.95325H12.9458L17.5695 14.5263L22.1932 9.95325H18.7648C18.7665 9.92725 18.7674 9.90106 18.7674 9.87458C18.7658 7.91093 18.133 5.99912 16.9612 4.41793C15.7896 2.83675 14.1403 1.66889 12.2538 1.08464C10.3673 0.500389 8.34237 0.530309 6.47423 1.17004C4.60607 1.80976 2.99241 3.02584 1.86853 4.64094C0.744655 6.25605 0.16934 8.18571 0.226474 10.1486C0.283609 12.1114 0.970211 14.0048 2.18615 15.5527C3.4021 17.1005 5.08379 18.2218 6.98603 18.7532C8.88827 19.2845 10.9116 19.198 12.7609 18.5064C13.3801 18.2749 13.6931 17.5883 13.4601 16.973C13.2271 16.3575 12.5362 16.0465 11.917 16.278C10.5456 16.791 9.04503 16.8551 7.63431 16.4611C6.22357 16.067 4.9764 15.2353 4.07464 14.0874C3.17287 12.9395 2.66368 11.5354 2.6213 10.0797C2.57894 8.62404 3.0056 7.19296 3.83909 5.99518C4.67257 4.79739 5.86929 3.89552 7.25474 3.4211Z" fill="#8391AD" /></svg></div>
            </div>
            <div class="flex items-center w-full py-20 px-15 sm:p-0 sm:hidden">
                <div class="search sm:hidden mr-20" x-data="App.search()" x-init="init()"><input class="search-input" value="Test message">
                    <div class="search-btn" @click="search()"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.1186 17.2581L15.1033 13.2428C15.9666 12.0397 16.4813 10.6217 16.5907 9.14499C16.7002 7.66823 16.4002 6.18991 15.7238 4.87264C15.0473 3.55537 14.0206 2.45021 12.7567 1.67875C11.4927 0.907283 10.0404 0.49941 8.5596 0.500001C6.42392 0.501027 4.376 1.34988 2.86584 2.86004C1.35568 4.3702 0.506832 6.41812 0.505806 8.5538C0.503824 10.0352 0.910842 11.4883 1.68201 12.7532C2.45317 14.018 3.55855 15.0453 4.87633 15.722C6.1941 16.3988 7.67312 16.6985 9.15039 16.5883C10.6277 16.4781 12.0458 15.9622 13.2486 15.0975L17.2639 19.1167C17.5104 19.3631 17.8447 19.5016 18.1932 19.5016C18.5418 19.5016 18.876 19.3631 19.1225 19.1167C19.369 18.8702 19.5074 18.5359 19.5074 18.1874C19.5074 17.8388 19.369 17.5046 19.1225 17.2581H19.1186ZM4.72243 12.3948C3.83664 11.5074 3.28591 10.3402 3.16404 9.09228C3.04218 7.84431 3.35671 6.5927 4.05407 5.55061C4.75142 4.50852 5.78848 3.74041 6.98859 3.37711C8.1887 3.01381 9.47765 3.07779 10.6359 3.55815C11.7941 4.0385 12.75 4.90553 13.3408 6.01156C13.9315 7.11758 14.1205 8.39419 13.8757 9.62395C13.6308 10.8537 12.9672 11.9606 11.9979 12.756C11.0286 13.5514 9.81351 13.9862 8.5596 13.9862C7.84657 13.9878 7.1403 13.8479 6.48167 13.5748C5.82303 13.3016 5.22509 12.9006 4.72243 12.3948Z" fill="#8391AD" /></svg></div>
                </div>
                <div class="reload-btn flex" x-data="{active: false}" :class="{'reload-btn-active' : active}" @dates-change.window="active = true" @click="$store.data.createJson('refresh')"><svg width="23" height="20" viewBox="0 0 23 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.25474 3.4211C8.64019 2.94667 10.1419 2.92448 11.541 3.35776C12.94 3.79106 14.1632 4.65716 15.0321 5.82979C15.901 7.00243 16.3703 8.42026 16.3716 9.87658C16.3716 9.9023 16.3724 9.92791 16.3741 9.95325H12.9458L17.5695 14.5263L22.1932 9.95325H18.7648C18.7665 9.92725 18.7674 9.90106 18.7674 9.87458C18.7658 7.91093 18.133 5.99912 16.9612 4.41793C15.7896 2.83675 14.1403 1.66889 12.2538 1.08464C10.3673 0.500389 8.34237 0.530309 6.47423 1.17004C4.60607 1.80976 2.99241 3.02584 1.86853 4.64094C0.744655 6.25605 0.16934 8.18571 0.226474 10.1486C0.283609 12.1114 0.970211 14.0048 2.18615 15.5527C3.4021 17.1005 5.08379 18.2218 6.98603 18.7532C8.88827 19.2845 10.9116 19.198 12.7609 18.5064C13.3801 18.2749 13.6931 17.5883 13.4601 16.973C13.2271 16.3575 12.5362 16.0465 11.917 16.278C10.5456 16.791 9.04503 16.8551 7.63431 16.4611C6.22357 16.067 4.9764 15.2353 4.07464 14.0874C3.17287 12.9395 2.66368 11.5354 2.6213 10.0797C2.57894 8.62404 3.0056 7.19296 3.83909 5.99518C4.67257 4.79739 5.86929 3.89552 7.25474 3.4211Z" fill="#8391AD" /></svg></div>
            </div>
        </section>
        <section class="pb-20">
            <div x-data="App.tableNavigation()" x-init="init(1)" class="table-nav">
                <div class="table-nav-controls hidden sm:flex">
                    <div @click="pageStart()" class="table-nav-control table-nav-control-disabled"><svg viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.60912 1L3.61258 6.07275L8.60912 11.1455M1 1V11.1455" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                        </svg></div>
                    <div @click="pagePrev()" class="table-nav-control"><svg viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.22396 1L1.22742 6.07275L6.22396 11.1455" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                        </svg></div>
                    <div @click="pageNext()" class="table-nav-control"><svg viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.868389 11.1455L5.86493 6.07276L0.868388 1.00002" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                        </svg></div>
                    <div @click="pageLast()" class="table-nav-control"><svg viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.50935 11.1458L6.50589 6.07301L1.50935 1.00026M9.11847 11.1458L9.11847 1.00026" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                        </svg></div>
                </div>
                <div class="flex items-center space-x-20">
                    <p class="text-gray-blue text-3xs cur">Show rows:</p>
                    <div class="flex items-center relative">
                        <p class="mr-10 text-3xs cursor-pointer" @click="dropdownActive = true" x-text="$store.data.limit_rows"></p>
                        <div class="w-15 h-10 cursor-pointer" :class="{'transform rotate-180' : dropdownActive}" @click="dropdownActive = true"><svg viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="10.9101" height="1.17367" rx="0.586834" transform="matrix(0.691321 0.722548 -0.497618 0.867396 0.584045 0.755127)" fill="#8391AD" />
                                <rect width="10.9063" height="1.17402" rx="0.587009" transform="matrix(-0.692167 0.721737 -0.49674 -0.8679 15 1.76892)" fill="#8391AD" /></svg></div>
                        <div class="row-count-dropdown" x-show="dropdownActive" x-cloak @click="selectItem($event)" @click.away="dropdownActive = false">
                            <div class="row-count-item">50</div>
                            <div class="row-count-item row-count-item-active">100</div>
                            <div class="row-count-item">250</div>
                            <div class="row-count-item">500</div>
                        </div>
                    </div>
                    <p class="hidden sm:block text-3xs"><span>501-1,000</span> of <span>2000</span></p>
                </div>
                <div x-data="App.tableMobileSorting()" x-init="init('date_created', 'desc')" class="2md:hidden">
                    <div class="flex items-center relative">
                        <p class="mr-8 text-3xs font-medium">Sort:</p>
                        <div @click="dropdownActive = true" class="arrow-sort mr-5 cursor-pointer" :class="{'arrow-sort-reverse' : sortDir === 'asc'}"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round" stroke="#8391AD"></path>
                            </svg></div>
                        <p @click="dropdownActive = true" class="mr-5 text-3xs cursor-pointer" x-text="value"></p>
                        <div @click="dropdownActive = true" class="cursor-pointer"><svg width="15" height="10" viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="10.9101" height="1.17367" rx="0.586834" transform="matrix(0.691321 0.722548 -0.497618 0.867396 0.584045 0.755127)" fill="#8391AD"></rect>
                                <rect width="10.9063" height="1.17402" rx="0.587009" transform="matrix(-0.692167 0.721737 -0.49674 -0.8679 15 1.76892)" fill="#8391AD"></rect>
                            </svg></div>
                        <div x-show="dropdownActive" x-cloak @click="selectItem($event)" @click.away="dropdownActive = false" class="dropdown top-25 right-0">
                            <div data-table-col-name="date_created" class="dropdown-item">Date</div>
                            <div data-table-col-name="name" class="dropdown-item">Name</div>
                            <div data-table-col-name="status" class="dropdown-item">Status</div>
                            <div data-table-col-name="property_type" class="dropdown-item">Property Type</div>
                            <div data-table-col-name="service_area" class="dropdown-item">Area</div>
                            <div data-table-col-name="tracking_source" class="dropdown-item">Source</div>
                            <div data-table-col-name="created_by" class="dropdown-item">Created By</div>
                            <div data-table-col-name="total_appointments" class="dropdown-item">Appointments</div>
                            <div data-table-col-name="service_resource" class="dropdown-item">Service Resource</div>
                            <div data-table-col-name="total" class="dropdown-item">Total</div>
                            <div data-table-col-name="paid" class="dropdown-item">Paid</div>
                            <div class="flex items-center px-20 py-10 mb-5"><label class="checkbox mr-20"><span class="block w-20 transform rotate-180"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round" stroke="#8391AD"></path>
                                        </svg> </span><input data-table-sort-dir="asc" type="radio" name="radio"> <span class="checkbox-checkmark checkbox-checkmark-rounded"></span></label> <label class="checkbox"><span class="block w-20"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round" stroke="#8391AD"></path>
                                        </svg> </span><input data-table-sort-dir="desc" checked="checked" type="radio" name="radio"> <span class="checkbox-checkmark checkbox-checkmark-rounded"></span></label></div><button @click="submit()" class="btn-apply-blue mx-auto">Sort</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-15 my-20">
                <div class="table-desktop hidden 2md:block">



                    <table class="table">
                        <tbody>
                            <tr x-data="App.tableSorting()" x-init="init('date_created', 'desc')">
                                <th>
                                    <div data-table-sort data-table-col="date_created" class="table-cell table-header-cell">
                                        <p class="table-text table-header-text">Date</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="name" class="table-cell table-header-cell">
                                        <p class="table-text table-header-text">Name</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="status" class="table-cell table-header-cell">
                                        <div x-data="{...App.checkboxes(), ...App.tableFilters()}" x-init="init(), initTableFilters()" @resize.window="resized()">
                                            <div class="table-filter-btn" :class="{'table-filter-btn-filtered' : isActive}" @click="dropdownActive = true"><svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.164 8.274H4.836C4.771 8.274 4.71467 8.232 4.67133 8.166L0.485334 1.074C0.372668 0.887998 0.472334 0.599998 0.650001 0.599998H12.3587C12.5363 0.599998 12.6317 0.887998 12.5233 1.074L8.333 8.166C8.28967 8.232 8.229 8.274 8.164 8.274Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                    <path d="M8.164 14.418L5.11767 17.316C4.95734 17.466 4.73634 17.316 4.73634 17.052V8.59201C4.73634 8.41201 4.84467 8.26801 4.979 8.26801H8.02533C8.15967 8.26801 8.268 8.41201 8.268 8.59201V14.154C8.26367 14.256 8.229 14.358 8.164 14.418Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                </svg></div>
                                            <div class="table-filter-dropdown" x-show="dropdownActive" x-cloak @click.prevent="selectItem($event)" @click.away="dropdownActive = false">
                                                <div class="table-filter-list">
                                                    <div class="table-filter-item"><label class="checkbox">All <input type="checkbox" checked="checked" data-all> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Service call <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Recall <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                </div><button class="btn-apply-blue mx-auto" @click="submit(),filter()">Filter</button>
                                            </div>
                                        </div>
                                        <p class="table-text table-header-text">Status</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="property_type" class="table-cell table-header-cell">
                                        <div x-data="{...App.checkboxes(), ...App.tableFilters()}" x-init="init(), initTableFilters()" @resize.window="resized()">
                                            <div class="table-filter-btn" :class="{'table-filter-btn-filtered' : isActive}" @click="dropdownActive = true"><svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.164 8.274H4.836C4.771 8.274 4.71467 8.232 4.67133 8.166L0.485334 1.074C0.372668 0.887998 0.472334 0.599998 0.650001 0.599998H12.3587C12.5363 0.599998 12.6317 0.887998 12.5233 1.074L8.333 8.166C8.28967 8.232 8.229 8.274 8.164 8.274Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                    <path d="M8.164 14.418L5.11767 17.316C4.95734 17.466 4.73634 17.316 4.73634 17.052V8.59201C4.73634 8.41201 4.84467 8.26801 4.979 8.26801H8.02533C8.15967 8.26801 8.268 8.41201 8.268 8.59201V14.154C8.26367 14.256 8.229 14.358 8.164 14.418Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                </svg></div>
                                            <div class="table-filter-dropdown" x-show="dropdownActive" x-cloak @click.prevent="selectItem($event)" @click.away="dropdownActive = false">
                                                <div class="table-filter-list">
                                                    <div class="table-filter-item"><label class="checkbox">All <input type="checkbox" checked="checked" data-all> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Service call <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Recall <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                </div><button class="btn-apply-blue mx-auto" @click="submit(),filter()">Filter</button>
                                            </div>
                                        </div>
                                        <p class="table-text table-header-text">Property Type</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="service_area" class="table-cell table-header-cell">
                                        <div x-data="{...App.checkboxes(), ...App.tableFilters()}" x-init="init(), initTableFilters()" @resize.window="resized()">
                                            <div class="table-filter-btn" :class="{'table-filter-btn-filtered' : isActive}" @click="dropdownActive = true"><svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.164 8.274H4.836C4.771 8.274 4.71467 8.232 4.67133 8.166L0.485334 1.074C0.372668 0.887998 0.472334 0.599998 0.650001 0.599998H12.3587C12.5363 0.599998 12.6317 0.887998 12.5233 1.074L8.333 8.166C8.28967 8.232 8.229 8.274 8.164 8.274Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                    <path d="M8.164 14.418L5.11767 17.316C4.95734 17.466 4.73634 17.316 4.73634 17.052V8.59201C4.73634 8.41201 4.84467 8.26801 4.979 8.26801H8.02533C8.15967 8.26801 8.268 8.41201 8.268 8.59201V14.154C8.26367 14.256 8.229 14.358 8.164 14.418Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                </svg></div>
                                            <div class="table-filter-dropdown" x-show="dropdownActive" x-cloak @click.prevent="selectItem($event)" @click.away="dropdownActive = false">
                                                <div class="table-filter-list">
                                                    <div class="table-filter-item"><label class="checkbox">All <input type="checkbox" checked="checked" data-all> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Service call <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Recall <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                </div><button class="btn-apply-blue mx-auto" @click="submit(),filter()">Filter</button>
                                            </div>
                                        </div>
                                        <p class="table-text table-header-text">Area</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="tracking_source" class="table-cell table-header-cell">
                                        <div x-data="{...App.checkboxes(), ...App.tableFilters()}" x-init="init(), initTableFilters()" @resize.window="resized()">
                                            <div class="table-filter-btn" :class="{'table-filter-btn-filtered' : isActive}" @click="dropdownActive = true"><svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.164 8.274H4.836C4.771 8.274 4.71467 8.232 4.67133 8.166L0.485334 1.074C0.372668 0.887998 0.472334 0.599998 0.650001 0.599998H12.3587C12.5363 0.599998 12.6317 0.887998 12.5233 1.074L8.333 8.166C8.28967 8.232 8.229 8.274 8.164 8.274Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                    <path d="M8.164 14.418L5.11767 17.316C4.95734 17.466 4.73634 17.316 4.73634 17.052V8.59201C4.73634 8.41201 4.84467 8.26801 4.979 8.26801H8.02533C8.15967 8.26801 8.268 8.41201 8.268 8.59201V14.154C8.26367 14.256 8.229 14.358 8.164 14.418Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                </svg></div>
                                            <div class="table-filter-dropdown" x-show="dropdownActive" x-cloak @click.prevent="selectItem($event)" @click.away="dropdownActive = false">
                                                <div class="table-filter-list">
                                                    <div class="table-filter-item"><label class="checkbox">All <input type="checkbox" data-all> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Service call <input type="checkbox" checked="checked"> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Recall <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Test <input type="checkbox" checked="checked"> <span class="checkbox-checkmark"></span></label></div>
                                                </div><button class="btn-apply-blue mx-auto" @click="submit(),filter()">Filter</button>
                                            </div>
                                        </div>
                                        <p class="table-text table-header-text">Source</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="created_by" class="table-cell table-header-cell">
                                        <div x-data="{...App.checkboxes(), ...App.tableFilters()}" x-init="init(), initTableFilters()" @resize.window="resized()">
                                            <div class="table-filter-btn" :class="{'table-filter-btn-filtered' : isActive}" @click="dropdownActive = true"><svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.164 8.274H4.836C4.771 8.274 4.71467 8.232 4.67133 8.166L0.485334 1.074C0.372668 0.887998 0.472334 0.599998 0.650001 0.599998H12.3587C12.5363 0.599998 12.6317 0.887998 12.5233 1.074L8.333 8.166C8.28967 8.232 8.229 8.274 8.164 8.274Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                    <path d="M8.164 14.418L5.11767 17.316C4.95734 17.466 4.73634 17.316 4.73634 17.052V8.59201C4.73634 8.41201 4.84467 8.26801 4.979 8.26801H8.02533C8.15967 8.26801 8.268 8.41201 8.268 8.59201V14.154C8.26367 14.256 8.229 14.358 8.164 14.418Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                </svg></div>
                                            <div class="table-filter-dropdown" x-show="dropdownActive" x-cloak @click.prevent="selectItem($event)" @click.away="dropdownActive = false">
                                                <div class="table-filter-list">
                                                    <div class="table-filter-item"><label class="checkbox">All <input type="checkbox" checked="checked" data-all> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Service call <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Recall <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                </div><button class="btn-apply-blue mx-auto" @click="submit(),filter()">Filter</button>
                                            </div>
                                        </div>
                                        <p class="table-text table-header-text">Created by</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="total_appointments" class="table-cell table-header-cell">
                                        <p class="table-text table-header-text">Appointments</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="service_resources" class="table-cell table-header-cell">
                                        <div x-data="{...App.checkboxes(), ...App.tableFilters()}" x-init="init(), initTableFilters()" @resize.window="resized()">
                                            <div class="table-filter-btn" :class="{'table-filter-btn-filtered' : isActive}" @click="dropdownActive = true"><svg width="13" height="18" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8.164 8.274H4.836C4.771 8.274 4.71467 8.232 4.67133 8.166L0.485334 1.074C0.372668 0.887998 0.472334 0.599998 0.650001 0.599998H12.3587C12.5363 0.599998 12.6317 0.887998 12.5233 1.074L8.333 8.166C8.28967 8.232 8.229 8.274 8.164 8.274Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                    <path d="M8.164 14.418L5.11767 17.316C4.95734 17.466 4.73634 17.316 4.73634 17.052V8.59201C4.73634 8.41201 4.84467 8.26801 4.979 8.26801H8.02533C8.15967 8.26801 8.268 8.41201 8.268 8.59201V14.154C8.26367 14.256 8.229 14.358 8.164 14.418Z" fill="white" stroke="#8391AD" stroke-width="1.4" stroke-miterlimit="10"></path>
                                                </svg></div>
                                            <div class="table-filter-dropdown" x-show="dropdownActive" x-cloak @click.prevent="selectItem($event)" @click.away="dropdownActive = false">
                                                <div class="table-filter-list">
                                                    <div class="table-filter-item"><label class="checkbox">All <input type="checkbox" checked="checked" data-all> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Service call <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                    <div class="table-filter-item"><label class="checkbox">Recall <input type="checkbox"> <span class="checkbox-checkmark"></span></label></div>
                                                </div><button class="btn-apply-blue mx-auto" @click="submit(),filter()">Filter</button>
                                            </div>
                                        </div>
                                        <p class="table-text table-header-text">Service Resource</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="total" class="table-cell table-header-cell">
                                        <p class="table-text table-header-text">Total</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                                <th>
                                    <div data-table-sort data-table-col="paid" class="table-cell table-header-cell">
                                        <p class="table-text table-header-text">Paid</p>
                                        <div class="table-sort-btn"><svg viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 5 L6 10.28571 V10 1 M6 10.28571 L11 5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg></div>
                                    </div>
                                </th>
                            </tr>
                            <tr x-data="App.tableRowSend()" @click="send($event, '67383010fdkejdhiiw', 'job')" class="table-row-content">
                                <td class="table-cell">
                                    <p class="table-text">Mary Gray</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">2675NSM-A-01</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Done</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Residental</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Houston, TX</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Google Ads</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Linda</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">4</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Mike, Sam</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">$859.98</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">$859.98</p>
                                </td>
                            </tr>
                            <tr x-data="App.tableRowSend()" @click="send($event, '67383010cdkewdhiiw', 'job')" class="table-row-content">
                                <td class="table-cell">
                                    <p class="table-text">Mary Gray</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">2675NSM-A-01</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Done</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Residental</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Houston, TX</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Google Ads</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Linda</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">4</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Mike, Sam</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">$859.98</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">$859.98</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="hidden sm:block 2md:hidden">
                    <table class="table">
                        <tbody>
                            <tr class="table-row-content" x-data="App.tableRowSend()" @click="send($event, '67383010fdkejdhiiw', 'job')">
                                <td class="table-cell">
                                    <p class="table-text">2675NSM-A-01X</p>
                                    <p class="table-text">06/25/2019 2:12 pm</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Linda</p>
                                    <p class="table-text">Mike, Sam</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Houston, TX</p>
                                    <p class="table-text">Google Ads</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Residental</p>
                                    <p class="table-text">Done</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Appointments: 4</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Total: $859.98</p>
                                    <p class="table-text">Paid: $859.98</p>
                                </td>

                            </tr>
                            <tr class="table-row-content" x-data="App.tableRowSend()" @click="send($event, '67383010fdkejdhiiw', 'job')">
                                <td class="table-cell">
                                    <p class="table-text">2675NSM-A-01X</p>
                                    <p class="table-text">06/25/2019 2:12 pm</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Linda</p>
                                    <p class="table-text">Mike, Sam</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Houston, TX</p>
                                    <p class="table-text">Google Ads</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Residental</p>
                                    <p class="table-text">Done</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Appointments: 4</p>
                                </td>
                                <td class="table-cell">
                                    <p class="table-text">Total: $859.98</p>
                                    <p class="table-text">Paid: $859.98</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="sm:hidden space-y-10 mb-80">
                    <div class="table-row-content table-row-mobile-content" x-data="App.tableRowSend()" @click="send($event, '67383010fdkejdhiiw', 'job')">
                        <div class="flex justify-between items-start mb-10">
                            <div class="mr-10">
                                <div class="text-2xs font-medium mb-5">2675NSM-A-01X</div>
                                <div class="text-3xs">Appointments: 4</div>
                            </div>
                            <div class="text-right">
                                <div class="mb-2 text-3xs">Paid: <span class="font-medium">$859.98</span></div>
                                <div class="mb-2 text-3xs">Total: <span class="font-medium">$859.98</span></div>
                                <div class="mb-2 text-3xs">Residental</div>
                                <div class="text-3xs font-medium">Done</div>
                            </div>
                        </div>
                        <div class="flex justify-between items-end">
                            <div class="mr-10">
                                <div class="flex items-center flex-wrap"><span class="mr-2 text-2xs text-gray-blue font-medium whitespace-nowrap">Area:</span><span class="text-3xs">Houston, TX</span></div>
                                <div class="flex items-center flex-wrap"><span class="mr-2 text-2xs text-gray-blue font-medium whitespace-nowrap">Source:</span><span class="text-3xs">Google Ads</span></div>
                                <div class="flex items-center flex-wrap"><span class="mr-2 text-2xs text-gray-blue font-medium whitespace-nowrap">Service Resource:</span><span class="text-3xs">Mike, Sam</span></div>
                            </div>
                            <div class="text-right">
                                <div class="text-4xs xs:text-3xs mb-2">06/25/2019 2:12 pm</div>
                                <div class="text-4xs xs:text-3xs"><span class="mr-2">Created by</span> <span>Linda</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="table-row-content table-row-mobile-content" x-data="App.tableRowSend()" @click="send($event, '67383010fdkejdhiiw', 'job')">
                        <div class="flex justify-between items-start mb-10">
                            <div class="mr-10">
                                <div class="text-2xs font-medium mb-5">2675NSM-A-01X</div>
                                <div class="text-3xs">Appointments: 4</div>
                            </div>
                            <div class="text-right">
                                <div class="mb-2 text-3xs">Paid: <span class="font-medium">$859.98</span></div>
                                <div class="mb-2 text-3xs">Total: <span class="font-medium">$859.98</span></div>
                                <div class="mb-2 text-3xs">Residental</div>
                                <div class="text-3xs font-medium">Done</div>
                            </div>
                        </div>
                        <div class="flex justify-between items-end">
                            <div class="mr-10">
                                <div class="flex items-center flex-wrap"><span class="mr-2 text-2xs text-gray-blue font-medium whitespace-nowrap">Area:</span><span class="text-3xs">Houston, TX</span></div>
                                <div class="flex items-center flex-wrap"><span class="mr-2 text-2xs text-gray-blue font-medium whitespace-nowrap">Source:</span><span class="text-3xs">Google Ads</span></div>
                                <div class="flex items-center flex-wrap"><span class="mr-2 text-2xs text-gray-blue font-medium whitespace-nowrap">Service Resource:</span><span class="text-3xs">Mike, Sam</span></div>
                            </div>
                            <div class="text-right">
                                <div class="text-4xs xs:text-3xs mb-2">06/25/2019 2:12 pm</div>
                                <div class="text-4xs xs:text-3xs"><span class="mr-2">Created by</span> <span>Linda</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-data="App.tableNavigation()" x-init="init(1)" class="table-nav table-nav-fixed">
                <div class="table-nav-controls flex">
                    <div @click="pageStart()" class="table-nav-control table-nav-control-disabled"><svg viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.60912 1L3.61258 6.07275L8.60912 11.1455M1 1V11.1455" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                        </svg></div>
                    <div @click="pagePrev()" class="table-nav-control"><svg viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.22396 1L1.22742 6.07275L6.22396 11.1455" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                        </svg></div>
                    <div @click="pageNext()" class="table-nav-control"><svg viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.868389 11.1455L5.86493 6.07276L0.868388 1.00002" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                        </svg></div>
                    <div @click="pageLast()" class="table-nav-control"><svg viewBox="0 0 10 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.50935 11.1458L6.50589 6.07301L1.50935 1.00026M9.11847 11.1458L9.11847 1.00026" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" stroke="#000000"></path>
                        </svg></div>
                </div>
                <div class="flex items-center sm:space-x-20 mx-auto sm:mx-0 mt-15 sm:mt-0">
                    <p class="hidden sm:block text-gray-blue text-3xs">Show rows:</p>
                    <div class="hidden sm:flex items-center relative">
                        <p class="mr-10 text-3xs cursor-pointer" @click="dropdownActive = true" x-text="$store.data.limit_rows"></p>
                        <div class="w-15 h-10" :class="{'transform rotate-180' : dropdownActive}" @click="dropdownActive = true"><svg viewBox="0 0 15 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="10.9101" height="1.17367" rx="0.586834" transform="matrix(0.691321 0.722548 -0.497618 0.867396 0.584045 0.755127)" fill="#8391AD" />
                                <rect width="10.9063" height="1.17402" rx="0.587009" transform="matrix(-0.692167 0.721737 -0.49674 -0.8679 15 1.76892)" fill="#8391AD" /></svg></div>
                        <div class="row-count-dropdown" x-show="dropdownActive" x-cloak @click="selectItem($event)" @click.away="dropdownActive = false">
                            <div class="row-count-item">50</div>
                            <div class="row-count-item row-count-item-active">100</div>
                            <div class="row-count-item">250</div>
                            <div class="row-count-item">500</div>
                        </div>
                    </div>
                    <p class="text-3xs"><span>501-1,000</span> of <span>2000</span></p>
                </div>
            </div>
        </section>
    </div>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Jobs Details</h2>
                       <!-- <a href="create.php" class="btn btn-success pull-right">Add a New Job</a> -->
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM `88888-jobs` ";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Status</th>";
                       
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['date_created'] . "</td>";
                                        echo "<td>" . $row['status'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                    // Close connection
                    mysqli_close($link);
                    ?>

                </div>
            </div>        
        </div>
    </div>

</body>

</html>