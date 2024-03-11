@extends('admin.layout.master')






    <style>
        /* Custom CSS for responsiveness */
        @media (max-width: 767px) {
            .container.d-flex {
                flex-direction: column;
            }

            .col-12 {
                width: 100%;
            }
        }
    </style>

    <style>
        .dropzone {
            background: #e3e6ff;
            border-radius: 13px;
            /*max-width: 550px;*/
            margin-left: auto;
            margin-right: auto;
            border: 2px dotted #1833FF;
            /*margin-top: 50px;*/
            min-height: 90px;
            padding: 31px 28px;
            /* height: 200px; */
        }

    </style>


    <!-- Navbar -->

    @include('admin.layout.navbar')

    <!-- End Navbar -->
    <div class="py-4 container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="mb-4 col-md-12 mb-lg-0">
                    <div class="pt-4 pb-3 shadow border-radius-lg" style="height: 150px; background-color: #BE8E4F;">
                        <div class="p-3 pb-0 card-header">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-0 text-white capitalize">Career Cafe</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4 card">

                    <div class="px-0 pb-2 card-body">
                        <div class="p-3 ">
                            <h2>Add New Content</h2>
                            <div class="row">
                                <div class="container d-flex">
                                    <div class="col-12 col-md-12">
                                        <form action="{{ route('career.store') }}" class="justify-content-center"
                                              method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="mb-3 form-group justify-content-center">
                                                <div class="mb-5 row">
                                                    <div class="col-md-6">
                                                        <label for="title" class="text-semibold">Content Type</label>
                                                        <div class="input-container">
                                                            <input type="text" name="content_type" class="p-2 border form-control"
                                                                   placeholder="Select Your Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="title" class="text-semibold">Tags</label>
                                                        <div class="input-container">
                                                            <input name="tags" type="text" class="p-2 border form-control"
                                                                   placeholder="">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="mb-5 row">
                                                    <div class="col-md-4">
                                                        <label for="title" class="text-semibold">Title</label>
                                                        <div class="input-container">
                                                            <input type="text" name="title" class="p-2 border form-control"
                                                                   placeholder="Enter Title">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="title"  class="text-semibold">Authors</label>
                                                        <div class="input-container">
                                                            <input name="authors" type="text" class="p-2 border form-control"
                                                                   placeholder="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="title" class="text-semibold">SEO Tags</label>
                                                        <div class="input-container">
                                                            <input name="seo_tags" type="text" class="p-2 border form-control"
                                                                   placeholder="Input in the third container">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-5 row">
                                                    <div class="col-md-4">
                                                        <label for="durationType" class="text-semibold">Visibility
                                                            Type</label>
                                                        <div class="input-container">
                                                            <select class="p-2 border form-control" id="durationType"
                                                                    name="visibility">
                                                                <option value="hi">Hi</option>
                                                                <option value="hello">Hello</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <label for="durationType" class="text-semibold">Access</label>
                                                        <div class="input-container">
                                                            <select class="p-2 border form-control" id="access"
                                                                    name="access">
                                                                <option value="hi">Hi</option>
                                                                <option value="hello">Hello</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="title" class="text-semibold">Price</label>
                                                        <div class="input-container">
                                                            <input name="price" type="number" class="p-2 border form-control"
                                                                   placeholder="0.00">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                                <div class="row">
{{--                                                    <div class="col-md-4">--}}
{{--                                                        <label for="title" class="text-semibold">Publication--}}
{{--                                                            Date</label>--}}
{{--                                                        <div class="input-container">--}}
{{--                                                            <input name="publication_date" type="date" class="p-2 border form-control">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

                                                    <div class="mb-5 col-md-12">
                                                        <label for="title" class="text-semibold">Publication Date</label>
                                                        <div class="input-container">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <select name="publication_date" class="p-2 border form-control">
                                                                        <option value="" selected disabled>Select Day</option>
                                                                        <!-- Generate day options -->
                                                                        <?php
                                                                        for ($day = 1; $day <= 31; $day++) {
                                                                            echo "<option value='$day'>$day</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select name="publication_month" class="p-2 border form-control">
                                                                        <option value="" selected disabled>Select Month</option>
                                                                        <!-- Generate month options -->
                                                                        <?php
                                                                        $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
                                                                        foreach ($months as $key => $month) {
                                                                            $value = $key + 1;
                                                                            echo "<option value='$value'>$month</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select name="publication_year" class="p-2 border form-control">
                                                                        <option value="" selected disabled>Select Year</option>
                                                                        <!-- Generate year options -->
                                                                        <?php
                                                                        $currentYear = date('Y');
                                                                        $startYear = $currentYear - 100; // Adjust range as needed
                                                                        for ($year = $currentYear; $year >= $startYear; $year--) {
                                                                            echo "<option value='$year'>$year</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    {{--                                                    <div class="col-md-4">--}}
                                                    {{--                                                            <label for="title" class="text-semibold">Upload Content file</label>--}}
                                                    {{--                                                                <div class="dropzone" id="dropzone">--}}
                                                    {{--                                                                    Drop files here<br>--}}
                                                    {{--                                                                </div>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}


                                                    {{--                                                <div class="col-md-4">--}}
                                                    {{--                                                    <label for="title" class="text-semibold">Upload Content file</label>--}}
                                                    {{--                                                    <div class="dropzone" id="dropzone">--}}
                                                    {{--                                                        Drop files here<br>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                </div>--}}
                                                </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="title" class="text-semibold">Enter Additional Details</label>
                                                    <div class="input-container">
                                                        <textarea name="additional_details" type="text" class="p-2 border form-control"
                                                                  placeholder="Input in the third container"> </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5 d-flex justify-content-center">
                                                <div class="col-md-5">Cover Image</div>
                                                <div class="ml-5 col-md-5">Upload Content File</div>
                                            </div>
                                            <div class="mt-5 d-flex">

                                                <div  id="image-upload" class="mr-2 dropzone col-md-5" name='cover_image'>

                                                </div>
                                                <div  id="file-upload" class="dropzone col-md-5" name='content_upload'>

                                                </div>

                                            </div>
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        --}}{{--                                                                                                            <div class="col-md-4">--}}
{{--                                                        <label for="title" class="text-semibold">Upload Content--}}
{{--                                                            file</label>--}}
{{--                                                        <div class="dropzone" id="dropzone">--}}
{{--                                                            Drop files here<br>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}


{{--                                                <div class="col-md-6">--}}
{{--                                                    <label for="title" class="text-semibold">Upload Content file</label>--}}
{{--                                                    <div class="dropzone" id="dropzone">--}}
{{--                                                        Drop files here<br>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                            </div>

                                </div>

                                </div>
                                <button type="submit" style="background-color: #BE8E4F;"
                                        class="btn btn-circle">Submit
                                </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <footer class="py-4 footer ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="mb-4 col-lg-6 mb-lg-0">
                    <div class="text-sm text-center copyright text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        ,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.npontu.com" class="font-weight-bold" target="_blank">Npontu
                            Technologies</a>

                    </div>
                </div>

            </div>
        </div>
    </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add click event listeners to each course section
            var courseSections = document.querySelectorAll('.course-section');

            courseSections.forEach(function (section) {
                var heading = section.querySelector('.course-heading');
                var content = section.querySelector('.course-content');
                var arrowIcon = section.querySelector(
                    '.fa-sort-up'); // Assuming you are using 'fa-sort-up' for the arrow icon

                heading.addEventListener('click', function () {
                    toggleVisibility(content);
                    toggleArrowIcon(arrowIcon);
                });
            });
        });

        // Function to toggle visibility of content
        function toggleVisibility(content) {
            // Toggle the 'hidden' class
            content.classList.toggle('hidden');
        }

        // Function to toggle arrow icon direction
        function toggleArrowIcon(arrowIcon) {
            // Toggle the 'fa-rotate-180' class to rotate the arrow icon
            arrowIcon.classList.toggle('fa-rotate-180');
        }
    </script>

    <script>
        function dropHandler(ev) {
            console.log("File(s) dropped");

            // Prevent default behavior (Prevent file from being opened)
            ev.preventDefault();

            if (ev.dataTransfer.items) {
                // Use DataTransferItemList interface to access the file(s)
                [...ev.dataTransfer.items].forEach((item, i) => {
                    // If dropped items aren't files, reject them
                    if (item.kind === "file") {
                        const file = item.getAsFile();
                        console.log(`… file[${i}].name = ${file.name}`);
                    }
                });
            } else {
                // Use DataTransfer interface to access the file(s)
                [...ev.dataTransfer.files].forEach((file, i) => {
                    console.log(`… file[${i}].name = ${file.name}`);
                });
            }
        }

    </script>


    <script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function (file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function () {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });

        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;
        dropzone.uploadFiles = function (files) {
            var self = this;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function (file, totalSteps, step) {
                        return function () {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };
                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }
    </script>

    <script type="text/javascript">



        new Dropzone('#image-upload', {
            url: '/file/post',
            thumbnailWidth: 200,
            maxFilesize: 1,
            acceptedFiles: '.jpg, .jpeg, .png, .pdf',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            removedfile: function (file) {
                file.previewElement.remove();
                return true;
            }
        });

        new Dropzone('#file-upload', {
            url: '/file/post',
            maxFilesize: 5,
            acceptedFiles: '.pdf, .doc, .docx,',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            removedfile: function (file) {
                file.previewElement.remove();
                return true;
            }
        });
    </script>
@endsection










@extends('admin.layout.master')






<style>
    /* Custom CSS for responsiveness */
    @media (max-width: 767px) {
        .container.d-flex {
            flex-direction: column;
        }

        .col-12 {
            width: 100%;
        }
    }

    .dropzone {
                overflow-y: auto;
                border: 0;
                background: transparent;
            }
            .dz-preview {
                width: 100%;
                margin: 0 !important;
                height: 100%;
                padding: 15px;
                position: absolute !important;
                top: 0;
            }
            .dz-photo {
                height: 100%;
                width: 100%;
                overflow: hidden;
                border-radius: 12px;
                background: #eae7e2;
            }
            .dz-drag-hover .dropzone-drag-area {
                border-style: solid;
                border-color: #86b7fe;;
            }
            .dz-thumbnail {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .dz-image {
                width: 90px !important;
                height: 90px !important;
                border-radius: 6px !important;
            }
            .dz-remove {
                display: none !important;
            }
            .dz-delete {
                width: 24px;
                height: 24px;
                background: rgba(0, 0, 0, 0.57);
                position: absolute;
                opacity: 0;
                transition: all 0.2s ease;
                top: 30px;
                right: 30px;
                border-radius: 100px;
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .dz-delete > svg {
                transform: scale(0.75);
                cursor: pointer;
            }
            .dz-preview:hover .dz-delete,
            .dz-preview:hover .dz-remove-image {
                opacity: 1;
            }
            .dz-message {
                height: 100%;
                margin: 0 !important;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .dropzone-drag-area {
                height: 300px;
                position: relative;
                padding: 0 !important;
                border-radius: 10px;
                border: 3px dashed #dbdeea;
            }
            .was-validated .form-control:valid {
                border-color: #dee2e6 !important;
                background-image: none;
            }
</style>

<style>
    .dropzone {
        background: #e3e6ff;
        border-radius: 13px;
        /*max-width: 550px;*/
        margin-left: auto;
        margin-right: auto;
        border: 2px dotted #1833FF;
        /*margin-top: 50px;*/
        min-height: 90px;
        padding: 31px 28px;
        /* height: 200px; */
    }
</style>


<!-- Navbar -->

@section('content')
@include('admin.layout.navbar')
    <!-- End Navbar -->
    <div class="py-4 container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="mb-4 col-md-12 mb-lg-0">
                    <div class="pt-4 pb-3 shadow border-radius-lg" style="height: 150px; background-color: #BE8E4F;">
                        <div class="p-3 pb-0 card-header">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-0 text-white capitalize">Career Cafe</h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-4 card">

                    <div class="px-0 pb-2 card-body">
                        <div class="p-3 ">
                            <h2>Add New Content</h2>
                            <div class="row">
                                <div class="container d-flex">
                                    <div class="col-12 col-md-12">
                                        <form action="{{ route('career.store') }}" class="justify-content-center"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3 form-group justify-content-center">
                                                <div class="mb-5 row">
                                                    <div class="col-md-5">
                                                        <label for="title" class="text-semibold">Content Type</label>
                                                        <div class="input-container">
                                                            <input type="text" name="content_type"
                                                                class="p-2 border form-control"
                                                                placeholder="Select Your Name">
                                                        </div>
                                                    </div>

                                                    {{-- <div class="col-md-6">
                                                        <label for="title" class="text-semibold">Tags</label>
                                                        <div class="input-container">
                                                            <input name="tags" type="text"
                                                                class="p-2 border form-control" placeholder="">
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-md-5 mt-3">
                                                        <div id="accordion" style="margin-top: 10px">
                                                            <div class="p-2 border rounded shadow accordion">
                                                                <div class="accordion-header " role="button" data-toggle="collapse"
                                                                    data-target="#panel-body-1" aria-expanded="true">
                                                                    <div class="justify-between d-flex">
                                                                        <h4 class="items-center " style="padding-left: 10px;">Tags
                                                                        </h4>
                                                                        {{-- <i class=" fas fa-sort-up"></i> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="accordion-body collapse show" id="panel-body-1"
                                                                    data-parent="#accordion" style="">


                                                                    <div class="p-2">
                                                                        <a href=""
                                                                            id="add-category-link" data-toggle="modal"
                                                                            data-target="#modalTagForm"><i
                                                                                class="fa-solid fa-plus"></i> Add Tag</a>
                                                                    </div>

                                                                    {{-- show all tags created --}}
                                                                    <u>
                                                                        @foreach ($careerTags as $tag)
                                                                            <li
                                                                                class="items-center text-center d-flex align-items-center justify-content-between">
                                                                                <div class="form-check">
                                                                                    <input name="tags" class="form-check-input"
                                                                                        type="checkbox" value="{{ $tag->id }}"
                                                                                        id="tag-{{ $tag->id }}">
                                                                                    <label class="form-check-label"
                                                                                        for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                                                                                </div>
                                                                                <button class="delete-item"
                                                                                    data-url="{{ route('career-tags.destroy', $tag->id) }}"
                                                                                    type="button"
                                                                                    style="border: none; background: none; cursor: pointer;">
                                                                                    <i class="fas fa-trash-alt"
                                                                                        style="color: red;"></i>
                                                                                </button>
                                                                            </li>
                                                                        @endforeach
                                                                    </u>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                </div>
                                                <div class="mb-5 row mt-5">
                                                    <div class="col-md-4">
                                                        <label for="title" class="text-semibold">Title</label>
                                                        <div class="input-container">
                                                            <input type="text" name="title"
                                                                class="p-2 border form-control" placeholder="Enter Title">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="title" class="text-semibold">Authors</label>
                                                        <div class="input-container">
                                                            <input name="authors" type="text"
                                                                class="p-2 border form-control" placeholder="">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="title" class="text-semibold">SEO Tags</label>
                                                        <div class="input-container">
                                                            <input name="seo_tags" type="text"
                                                                class="p-2 border form-control"
                                                                placeholder="Input in the third container">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-5 row">
                                                    <div class="col-md-4">
                                                        <label for="durationType" class="text-semibold">Visibility
                                                            Type</label>
                                                        <div class="input-container">
                                                            <select class="p-2 border form-control" id="durationType"
                                                                name="visibility">
                                                                <option value="hi">Hi</option>
                                                                <option value="hello">Hello</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-4">
                                                        <label for="durationType" class="text-semibold">Access</label>
                                                        <div class="input-container">
                                                            <select class="p-2 border form-control" id="access"
                                                                name="access">
                                                                <option value="hi">Hi</option>
                                                                <option value="hello">Hello</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label for="title" class="text-semibold">Price</label>
                                                        <div class="input-container">
                                                            <input name="price" type="number"
                                                                class="p-2 border form-control" placeholder="0.00">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">


                                                <div class="mb-5 col-md-12">
                                                    <label for="title" class="text-semibold">Publication Date</label>
                                                    <div class="input-container">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <select name="publication_date"
                                                                    class="p-2 border form-control">
                                                                    <option value="" selected disabled>Select Day
                                                                    </option>
                                                                    <!-- Generate day options -->
                                                                    <?php
                                                                    for ($day = 1; $day <= 31; $day++) {
                                                                        echo "<option value='$day'>$day</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select name="publication_month"
                                                                    class="p-2 border form-control">
                                                                    <option value="" selected disabled>Select Month
                                                                    </option>
                                                                    <!-- Generate month options -->
                                                                    <?php
                                                                    $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                                                    foreach ($months as $key => $month) {
                                                                        $value = $key + 1;
                                                                        echo "<option value='$value'>$month</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select name="publication_year"
                                                                    class="p-2 border form-control">
                                                                    <option value="" selected disabled>Select Year
                                                                    </option>
                                                                    <!-- Generate year options -->
                                                                    <?php
                                                                    $currentYear = date('Y');
                                                                    $startYear = $currentYear - 100; // Adjust range as needed
                                                                    for ($year = $currentYear; $year >= $startYear; $year--) {
                                                                        echo "<option value='$year'>$year</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="title" class="text-semibold">Enter Additional
                                                        Details</label>
                                                    <div class="input-container">
                                                        <textarea name="additional_details" type="text" class="p-2 border form-control"
                                                            placeholder="Input in the third container"> </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5 d-flex justify-content-center">
                                                <div class="col-md-5">Cover Image</div>
                                                <div class="ml-5 col-md-5">Upload Content File</div>
                                            </div>
                                            <div class="mt-5 d-flex">

                                                <div id="image-upload" class="mr-2 dropzone col-md-5" name='cover_image'>

                                                </div>
                                                <div id="file-upload" class="dropzone col-md-5" name='content_upload'>

                                                </div>

                                            </div>






                                    </div>
                                </div>

                            </div>

                        </div>
                        <button type="submit" style="background-color: #BE8E4F;" class="btn btn-circle">Submit
                        </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 footer ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="mb-4 col-lg-6 mb-lg-0">
                    <div class="text-sm text-center copyright text-muted text-lg-start">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        ,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.npontu.com" class="font-weight-bold" target="_blank">Npontu
                            Technologies</a>

                    </div>
                </div>

            </div>
        </div>
    </footer>


    {{-- Tag Modal form --}}
    <div class="modal fade" id="modalTagForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-center modal-header">
                    <h4 class="modal-title w-100 font-weight-bold">Create Tags</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="items-center m-4 text-center" style="align-items: center">
                    <form action="{{ route('career-tags.store') }}" method="post">
                        @csrf
                        <input type="text" class="p-2 border form-control" name="name" placeholder="Add Tags"
                            style="height: 40px; ">
                        <button class="mt-3 btn btn-primary btn-sm"
                            style="background-color: #BE8E4F; width: 50%">Add</button>
                    </form>
                </div>
                <h5 class="text-center"><i>Separate Tags With Commas</i></h5>
            </div>
        </div>
    </div>






    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add click event listeners to each course section
            var courseSections = document.querySelectorAll('.course-section');

            courseSections.forEach(function(section) {
                var heading = section.querySelector('.course-heading');
                var content = section.querySelector('.course-content');
                var arrowIcon = section.querySelector(
                    '.fa-sort-up'); // Assuming you are using 'fa-sort-up' for the arrow icon

                heading.addEventListener('click', function() {
                    toggleVisibility(content);
                    toggleArrowIcon(arrowIcon);
                });
            });
        });

        // Function to toggle visibility of content
        function toggleVisibility(content) {
            // Toggle the 'hidden' class
            content.classList.toggle('hidden');
        }

        // Function to toggle arrow icon direction
        function toggleArrowIcon(arrowIcon) {
            // Toggle the 'fa-rotate-180' class to rotate the arrow icon
            arrowIcon.classList.toggle('fa-rotate-180');
        }
    </script>

    <script>
        function dropHandler(ev) {
            console.log("File(s) dropped");

            // Prevent default behavior (Prevent file from being opened)
            ev.preventDefault();

            if (ev.dataTransfer.items) {
                // Use DataTransferItemList interface to access the file(s)
                [...ev.dataTransfer.items].forEach((item, i) => {
                    // If dropped items aren't files, reject them
                    if (item.kind === "file") {
                        const file = item.getAsFile();
                        console.log(`… file[${i}].name = ${file.name}`);
                    }
                });
            } else {
                // Use DataTransfer interface to access the file(s)
                [...ev.dataTransfer.files].forEach((file, i) => {
                    console.log(`… file[${i}].name = ${file.name}`);
                });
            }
        }
    </script>


    <script>
        var dropzone = new Dropzone('#file-upload', {
            previewTemplate: document.querySelector('#preview-template').innerHTML,
            parallelUploads: 3,
            thumbnailHeight: 150,
            thumbnailWidth: 150,
            maxFilesize: 5,
            filesizeBase: 1500,
            thumbnail: function(file, dataUrl) {
                if (file.previewElement) {
                    file.previewElement.classList.remove("dz-file-preview");
                    var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                    for (var i = 0; i < images.length; i++) {
                        var thumbnailElement = images[i];
                        thumbnailElement.alt = file.name;
                        thumbnailElement.src = dataUrl;
                    }
                    setTimeout(function() {
                        file.previewElement.classList.add("dz-image-preview");
                    }, 1);
                }
            }
        });

        var minSteps = 6,
            maxSteps = 60,
            timeBetweenSteps = 100,
            bytesPerStep = 100000;
        dropzone.uploadFiles = function(files) {
            var self = this;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
                for (var step = 0; step < totalSteps; step++) {
                    var duration = timeBetweenSteps * (step + 1);
                    setTimeout(function(file, totalSteps, step) {
                        return function() {
                            file.upload = {
                                progress: 100 * (step + 1) / totalSteps,
                                total: file.size,
                                bytesSent: (step + 1) * file.size / totalSteps
                            };
                            self.emit('uploadprogress', file, file.upload.progress, file.upload
                                .bytesSent);
                            if (file.upload.progress == 100) {
                                file.status = Dropzone.SUCCESS;
                                self.emit("success", file, 'success', null);
                                self.emit("complete", file);
                                self.processQueue();
                            }
                        };
                    }(file, totalSteps, step), duration);
                }
            }
        }
    </script>




    <script type="text/javascript">
        new Dropzone('#image-upload', {
            url: '/file/post',
            thumbnailWidth: 200,
            maxFilesize: 1,
            acceptedFiles: '.jpg, .jpeg, .png, .pdf',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            removedfile: function(file) {
                file.previewElement.remove();
                return true;
            }
        });

        new Dropzone('#file-upload', {
            url: '/file/post',
            maxFilesize: 5,
            acceptedFiles: '.pdf, .doc, .docx,',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            removedfile: function(file) {
                file.previewElement.remove();
                return true;
            }
        });
    </script>


@endsection

