
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="mx-auto max-w-5xl">
            <!-- Breadcrumb Start -->
            <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                    Staff Members
                </h2>

                <nav>
                    <ol class="flex items-center gap-2">
                        <li>
                            <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
                        </li>
                        <li class="font-medium text-primary">Staff Members</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <!-- Task Header Start -->
            <div class="flex flex-col gap-y-4 rounded-sm border border-stroke bg-white p-3 shadow-default dark:border-strokedark dark:bg-boxdark sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="container">
                        @if (session()->has('attention'))
                            <div class="alert alert-success">
                                {{ session('attention') }}
                            </div>
                        @endif
                        @if (session()->has('error_msg'))
                            <div class="alert alert-danger">
                                {{ session('error_msg') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col gap-4 2xsm:flex-row 2xsm:items-center">
                    <div class="flex -space-x-2">
                    </div>

                    <div x-data="{popupOpen: false}">
                        <button
                            @click="popupOpen = true"
                            class="flex items-center gap-2 rounded bg-primary py-2 px-4.5 font-medium text-white hover:bg-opacity-80"
                        >
                            <svg
                            class="fill-current"
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                            >
                            <path
                                d="M15 7H9V1C9 0.4 8.6 0 8 0C7.4 0 7 0.4 7 1V7H1C0.4 7 0 7.4 0 8C0 8.6 0.4 9 1 9H7V15C7 15.6 7.4 16 8 16C8.6 16 9 15.6 9 15V9H15C15.6 9 16 8.6 16 8C16 7.4 15.6 7 15 7Z"
                                fill=""
                            />
                            </svg>
                            Add New
                        </button>

                        <!-- ===== Task Popup Start ===== -->
                        <div x-show="popupOpen"
                            x-transition
                            class="fixed top-0 left-0 z-99999 flex h-screen w-full justify-center overflow-y-scroll bg-black/80 py-5 px-4">
                            <div @click.outside="popupOpen = false" class="relative m-auto w-full max-w-180 rounded-sm border border-stroke bg-white p-4 shadow-default dark:border-strokedark dark:bg-meta-4 sm:p-8 xl:p-10">
                                <button @click="popupOpen = false" class="absolute right-1 top-1 sm:right-5 sm:top-5">
                                    <svg
                                            class="fill-current"
                                            width="20"
                                            height="20"
                                            viewBox="0 0 20 20"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                        <path
                                        fill-rule="evenodd"
                                        clip-rule="evenodd"
                                        d="M11.8913 9.99599L19.5043 2.38635C20.032 1.85888 20.032 1.02306 19.5043 0.495589C18.9768 -0.0317329 18.141 -0.0317329 17.6135 0.495589L10.0001 8.10559L2.38673 0.495589C1.85917 -0.0317329 1.02343 -0.0317329 0.495873 0.495589C-0.0318274 1.02306 -0.0318274 1.85888 0.495873 2.38635L8.10887 9.99599L0.495873 17.6056C-0.0318274 18.1331 -0.0318274 18.9689 0.495873 19.4964C0.717307 19.7177 1.05898 19.9001 1.4413 19.9001C1.75372 19.9001 2.13282 19.7971 2.40606 19.4771L10.0001 11.8864L17.6135 19.4964C17.8349 19.7177 18.1766 19.9001 18.5589 19.9001C18.8724 19.9001 19.2531 19.7964 19.5265 19.4737C20.0319 18.9452 20.0245 18.1256 19.5043 17.6056L11.8913 9.99599Z"
                                        fill=""
                                        />
                                    </svg>
                                </button>
                                <div >
                                    <form method="POST" action="{{ route('create-user') }}"  class="needs-validation " validate enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-validation ">
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-xxl-6 col-lg-6 p-6.5">
                                                                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                                            <div class="col-6">
                                                                                <div class="border-2 border-dashed shadow-xs border-slate-200/60 dark:border-darkmode-400 rounded-md p-0">
                                                                                    <div class="h-20 relative image-fit cursor-pointer zoom-in mx-auto">
                                                                                        <img class="col-12" alt="" id="preview-image-before-upload_create" src="{{ asset('public/images/noimage.jpg') }}">
                                                                                        {{-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> --}}
                                                                                    </div>
                                                                                    <div class="mx-auto cursor-pointer relative mt-5">
                                                                                        {{-- <button type="button" class="btn btn-square btn-primary">Add Photo</button> --}}
                                                                                        <input type="file" id="prof_image_create" name="image_path" class="w-full h-full top-0 left-0"> 
                                                                                        {{-- <input type="file" name="image_path" class="w-full h-full"> --}}
                                                                                    </div>
                                                                                    <small>
                                                                                        {{-- @if ($errors->has('image_path'))
                                                                                            <span class="text-danger text-left">{{ $errors->first('image_path') }}</span>
                                                                                        @endif --}}
                                                                                    </small>
                                                                                </div>
                                                                            </div>                                                        
                                                                        </div>

                                                                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Firstname
                                                                                    <span class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" id="validationCustom01" name="fname"  placeholder="Enter a firstname.." required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter a name.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom01">Surname
                                                                                    <span class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" id="validationCustom01" name="lname"  placeholder="Enter a surname.." required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter a surname.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                                                        class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" name="email" id="validationCustom02"  placeholder="Your valid email.." required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter an Email.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                                                    <span class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" disabled class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" id="validationCustom03" placeholder="nakonde@123@" required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter a password.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom05">Gender
                                                                                    <span class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <select name="gender" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" id="validationCustom05">
                                                                                        <option  data-display="Select">Please select</option>
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                        <option value="Other">Other</option>
                                                                                    </select>
                                                                                    <div class="invalid-feedback">
                                                                                        Please select a one.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom06">Basic Pay
                                                                                    <span class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" name="basic_pay" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" id="validationCustom06" placeholder="21.60" required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter a Basic Pay.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom07">NRC
                                                                                    <span class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" name="nrc" id="validationCustom07"  placeholder="999999/99/9" required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter an NRC.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom08">Phone (ZM)
                                                                                    <span class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" name="phone" id="validationCustom08" placeholder="097-999-8888" required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter a phone no.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mb-3 row">
                                                                                <label class="col-lg-4 col-form-label" for="validationCustom09">Occupation <span
                                                                                        class="text-danger">*</span>
                                                                                </label>
                                                                                <div class="col-lg-6">
                                                                                    <input type="text" name="occupation" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" id="validationCustom09"  placeholder="Ex. Business Administrator" required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter an Occupation.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                                                <!--begin::Label-->
                                                                                
                                                                                <div class="col-md-6 fv-row">
                                                                                    <label class="fs-6 fw-semibold mb-2">
                                                                                        <span class="required">Gender</span>
                                                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Sex of the employee">
                                                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                                                <span class="path1"></span>
                                                                                                <span class="path2"></span>
                                                                                                <span class="path3"></span>
                                                                                            </i>
                                                                                        </span>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input-->
                                                                                    <select name="gender" aria-label="Select a gender" data-control="select2" data-placeholder="Select a gender..." data-dropdown-parent="#kt_modal_add_customer" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                                                        <option value="">Select a gender...</option>
                                                                                        <option value="Male">Male</option>
                                                                                        <option value="Female">Female</option>
                                                                                        
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 fv-row">
                                                                                    <label class="fs-6 fw-semibold mb-2">
                                                                                        <span class="required">Role</span>
                                                                                        <span class="ms-1" data-bs-toggle="tooltip" title="User role & permissions">
                                                                                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                                                                <span class="path1"></span>
                                                                                                <span class="path2"></span>
                                                                                                <span class="path3"></span>
                                                                                            </i>
                                                                                        </span>
                                                                                    </label>
                                                                                    <!--end::Label-->
                                                                                    <!--begin::Input-->
                                                                                    <select name="assigned_role" aria-label="Select a role" data-control="select2" data-placeholder="Select a role..." data-dropdown-parent="#kt_modal_add_customer" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                                                                        <option value="">Select a user role...</option>
                                                                                        @foreach($roles as $role)
                                                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                        <div class="mb-4.5 flex flex-col gap-6 xl:flex-row">
                                                                            <div class="col-md-12">
                                                                                {{-- <input type="hidden" name="assigned_role" readonly class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary invisible" id="validationCustom09" value="employee" placeholder="Employee" required>                                                              --}}
                                                                                <div class="mb-3 row">
                                                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Address <span
                                                                                            class="text-danger">*</span>
                                                                                    </label>
                                                                                    <div class="col-lg-6">
                                                                                        <textarea name="address" class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary" id="validationCustom04"  rows="5" placeholder="Where does the user stay?" required></textarea>
                                                                                        <div class="invalid-feedback">
                                                                                            Please enter an Address.
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray" id="create-employee-toastr-success-bottom-left" data-bs-dismiss="modal">Save changes</button>
                                        </div>  
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Task Header End -->

            <!-- Task List Wrapper Start -->
            <div class="mt-9 flex gap-5.5">
            <!-- Todo list -->
            @forelse($users as $user)
                @if(!$user->hasRole('user'))
                <div class="swim-lane w-1/4">
                    <div draggable="true" class="task relative flex cursor-move justify-between rounded-sm border border-stroke bg-white p-7 shadow-default dark:border-strokedark dark:bg-boxdark">
                            <div>
                                <h5 class="mb-4 text-lg font-medium text-black dark:text-white">
                                    {{ $user->fname.' '.$user->name.' '.$user->lname }}
                                </h5>

                                <div class="flex flex-col gap-2">
                                    <label for="taskCheckbox1" class="cursor-pointer">
                                        <div class="relative flex items-center pt-0.5">
                                            <div class="badge badge-light-success">
                                                @forelse($user->roles as $role)
                                                    <span class="capitalize">{{ ucwords($role->name) }}</span>
                                                @empty
                                                    <span>Unknown</span>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="relative flex items-center pt-0.5">
                                            <a href="mailto:{{$user->email}}" class="text-gray-600 text-hover-primary mb-1">{{ $user->email }}</a>
                                        </div>
                                        <div class="relative flex items-center pt-0.5">
                                            <a href="tel:{{$user->phone}}" class="text-gray-600 text-hover-primary mb-1">{{ $user->phone ?? 'No phone' }}</a>
                                        </div>
                                        <div class="relative flex items-center pt-0.5">
                                            <p class="text-gray-600 text-hover-primary mb-1">{{ $user->created_at->toFormattedDateString() }}</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            {{-- <div class="absolute right-4 top-4">
                                <div x-data="{openDropDown: false}" class="relative">
                                <button @click="openDropDown = !openDropDown">
                                    <svg
                                    width="18"
                                    height="18"
                                    viewBox="0 0 18 18"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    >
                                    <path
                                        d="M2.25 11.25C3.49264 11.25 4.5 10.2426 4.5 9C4.5 7.75736 3.49264 6.75 2.25 6.75C1.00736 6.75 0 7.75736 0 9C0 10.2426 1.00736 11.25 2.25 11.25Z"
                                        fill="#98A6AD"
                                    />
                                    <path
                                        d="M9 11.25C10.2426 11.25 11.25 10.2426 11.25 9C11.25 7.75736 10.2426 6.75 9 6.75C7.75736 6.75 6.75 7.75736 6.75 9C6.75 10.2426 7.75736 11.25 9 11.25Z"
                                        fill="#98A6AD"
                                    />
                                    <path
                                        d="M15.75 11.25C16.9926 11.25 18 10.2426 18 9C18 7.75736 16.9926 6.75 15.75 6.75C14.5074 6.75 13.5 7.75736 13.5 9C13.5 10.2426 14.5074 11.25 15.75 11.25Z"
                                        fill="#98A6AD"
                                    />
                                    </svg>
                                </button>
                                <div
                                    x-show="openDropDown"
                                    @click.outside="openDropDown = false"
                                    class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-sm border border-stroke bg-white p-1.5 shadow-default dark:border-strokedark dark:bg-boxdark"
                                >
                                    <button
                                    class="flex w-full items-center gap-2 rounded-sm py-1.5 px-4 text-left text-sm hover:bg-gray dark:hover:bg-meta-4"
                                    >
                                    <svg
                                        class="fill-current"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <g clip-path="url(#clip0_62_9787)">
                                        <path
                                            d="M15.55 2.97499C15.55 2.77499 15.475 2.57499 15.325 2.42499C15.025 2.12499 14.725 1.82499 14.45 1.52499C14.175 1.24999 13.925 0.974987 13.65 0.724987C13.525 0.574987 13.375 0.474986 13.175 0.449986C12.95 0.424986 12.75 0.474986 12.575 0.624987L10.875 2.32499H2.02495C1.17495 2.32499 0.449951 3.02499 0.449951 3.89999V14C0.449951 14.85 1.14995 15.575 2.02495 15.575H12.15C13 15.575 13.725 14.875 13.725 14V5.12499L15.35 3.49999C15.475 3.34999 15.55 3.17499 15.55 2.97499ZM8.19995 8.99999C8.17495 9.02499 8.17495 9.02499 8.14995 9.02499L6.34995 9.62499L6.94995 7.82499C6.94995 7.79999 6.97495 7.79999 6.97495 7.77499L11.475 3.27499L12.725 4.49999L8.19995 8.99999ZM12.575 14C12.575 14.25 12.375 14.45 12.125 14.45H2.02495C1.77495 14.45 1.57495 14.25 1.57495 14V3.87499C1.57495 3.62499 1.77495 3.42499 2.02495 3.42499H9.72495L6.17495 6.99999C6.04995 7.12499 5.92495 7.29999 5.87495 7.49999L4.94995 10.3C4.87495 10.5 4.92495 10.675 5.02495 10.85C5.09995 10.95 5.24995 11.1 5.52495 11.1H5.62495L8.49995 10.15C8.67495 10.1 8.84995 9.97499 8.97495 9.84999L12.575 6.24999V14ZM13.5 3.72499L12.25 2.49999L13.025 1.72499C13.225 1.92499 14.05 2.74999 14.25 2.97499L13.5 3.72499Z"
                                            fill=""
                                        />
                                        </g>
                                        <defs>
                                        <clipPath id="clip0_62_9787">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                        </defs>
                                    </svg>
                                    Edit
                                    </button>
                                    <button
                                    class="flex w-full items-center gap-2 rounded-sm py-1.5 px-4 text-left text-sm hover:bg-gray dark:hover:bg-meta-4"
                                    >
                                    <svg
                                        class="fill-current"
                                        width="16"
                                        height="16"
                                        viewBox="0 0 16 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                        d="M12.225 2.20005H10.3V1.77505C10.3 1.02505 9.70005 0.425049 8.95005 0.425049H7.02505C6.27505 0.425049 5.67505 1.02505 5.67505 1.77505V2.20005H3.75005C3.02505 2.20005 2.42505 2.80005 2.42505 3.52505V4.27505C2.42505 4.82505 2.75005 5.27505 3.22505 5.47505L3.62505 13.75C3.67505 14.775 4.52505 15.575 5.55005 15.575H10.4C11.425 15.575 12.275 14.775 12.325 13.75L12.75 5.45005C13.225 5.25005 13.55 4.77505 13.55 4.25005V3.50005C13.55 2.80005 12.95 2.20005 12.225 2.20005ZM6.82505 1.77505C6.82505 1.65005 6.92505 1.55005 7.05005 1.55005H8.97505C9.10005 1.55005 9.20005 1.65005 9.20005 1.77505V2.20005H6.85005V1.77505H6.82505ZM3.57505 3.52505C3.57505 3.42505 3.65005 3.32505 3.77505 3.32505H12.225C12.325 3.32505 12.425 3.40005 12.425 3.52505V4.27505C12.425 4.37505 12.35 4.47505 12.225 4.47505H3.77505C3.67505 4.47505 3.57505 4.40005 3.57505 4.27505V3.52505V3.52505ZM10.425 14.45H5.57505C5.15005 14.45 4.80005 14.125 4.77505 13.675L4.40005 5.57505H11.625L11.25 13.675C11.2 14.1 10.85 14.45 10.425 14.45Z"
                                        fill=""
                                        />
                                        <path
                                        d="M8.00005 8.1001C7.70005 8.1001 7.42505 8.3501 7.42505 8.6751V11.8501C7.42505 12.1501 7.67505 12.4251 8.00005 12.4251C8.30005 12.4251 8.57505 12.1751 8.57505 11.8501V8.6751C8.57505 8.3501 8.30005 8.1001 8.00005 8.1001Z"
                                        fill=""
                                        />
                                        <path
                                        d="M9.99994 8.60004C9.67494 8.57504 9.42494 8.80004 9.39994 9.12504L9.24994 11.325C9.22494 11.625 9.44994 11.9 9.77494 11.925C9.79994 11.925 9.79994 11.925 9.82494 11.925C10.1249 11.925 10.3749 11.7 10.3749 11.4L10.5249 9.20004C10.5249 8.87504 10.2999 8.62504 9.99994 8.60004Z"
                                        fill=""
                                        />
                                        <path
                                        d="M5.97497 8.60004C5.67497 8.62504 5.42497 8.90004 5.44997 9.20004L5.62497 11.4C5.64997 11.7 5.89997 11.925 6.17497 11.925C6.19997 11.925 6.19997 11.925 6.22497 11.925C6.52497 11.9 6.77497 11.625 6.74997 11.325L6.57497 9.12504C6.57497 8.80004 6.29997 8.57504 5.97497 8.60004Z"
                                        fill=""
                                        />
                                    </svg>
                                    Delete
                                    </button>
                                </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                @endif
            @empty
            </div>
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box text-center">
                    <p>No User Found</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</main>

