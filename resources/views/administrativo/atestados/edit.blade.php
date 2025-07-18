@extends('administrativo.layout.header')

@section('content')

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row g-6">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap mb-6 gap-2">
                                <div class="me-1">
                                    <h5 class="mb-0">UI/UX Basic Fundamentals</h5>
                                    <p class="mb-0">Funcionário. <span
                                            class="fw-medium text-heading"> TIAGO, POR O FUNCIONARIO NO RELACIONAMENTO </span>
                                    </p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-label-danger">UI/UX</span>
                                </div>
                            </div>
                            <div class="card academy-content shadow-none border">
                                <div class="p-2">
                                    <div class="cursor-pointer">
                                        <video class="w-100"
                                               poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg"
                                               id="plyr-video-player" playsinline controls>
                                            <source
                                                src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                                                type="video/mp4"/>
                                        </video>
                                    </div>
                                </div>
                                <div class="card-body pt-4">
                                    <h5>About this course</h5>
                                    <p class="mb-0">Learn web design in 1 hour with 25+ simple-to-use rules and
                                        guidelines —
                                        tons of amazing web design resources included!</p>
                                    <hr class="my-6"/>
                                    <h5>By the numbers</h5>
                                    <div class="d-flex flex-wrap row-gap-2">
                                        <div class="me-12">
                                            <p class="text-nowrap mb-2"><i
                                                    class="icon-base bx bx-check me-2 align-bottom"></i>Skill level: All
                                                Levels</p>
                                            <p class="text-nowrap mb-2"><i
                                                    class="icon-base bx bx-group me-2 align-top"></i>Students:
                                                38,815</p>
                                            <p class="text-nowrap mb-2"><i
                                                    class="icon-base bx bx-globe me-2 align-bottom"></i>Languages:
                                                English
                                            </p>
                                            <p class="text-nowrap mb-0"><i
                                                    class="icon-base bx bx-file me-2 align-bottom"></i>Captions: Yes</p>
                                        </div>
                                        <div>
                                            <p class="text-nowrap mb-2"><i
                                                    class="icon-base bx bx-video me-2 align-top ms-50"></i>Lectures: 19
                                            </p>
                                            <p class="text-nowrap mb-0"><i
                                                    class="icon-base bx bx-time-five me-2 align-top"></i>Video: 1.5
                                                total
                                                hours</p>
                                        </div>
                                    </div>
                                    <hr class="my-6"/>
                                    <h5>Description</h5>
                                    <p class="mb-6">The material of this course is also covered in my other course about
                                        web
                                        design and development with HTML5 & CSS3. Scroll to the bottom of this page to
                                        check
                                        out that course, too! If you're already taking my other course, you already have
                                        all
                                        it takes to start designing beautiful websites today!</p>
                                    <p class="mb-6">"Best web design course: If you're interested in web design, but
                                        want
                                        more than just a "how to use WordPress" course,I highly recommend this one." —
                                        Florian Giusti</p>
                                    <p>"Very helpful to us left-brained people: I am familiar with HTML, CSS, JQuery,
                                        and
                                        Twitter Bootstrap, but I needed instruction in web design. This course gave me
                                        practical, impactful techniques for making websites more beautiful and
                                        engaging." —
                                        Susan Darlene Cain</p>
                                    <hr class="my-6"/>
                                    <h5>Instructor</h5>
                                    <div class="d-flex justify-content-start align-items-center user-name">
                                        <div class="avatar-wrapper">
                                            <div class="avatar me-4"><img src="../../assets/img/avatars/11.png"
                                                                          alt="Avatar"
                                                                          class="rounded-circle"/></div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1">Devonne Wallbridge</h6>
                                            <small>Web Developer, Designer, and Teacher</small>
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

@endsection
