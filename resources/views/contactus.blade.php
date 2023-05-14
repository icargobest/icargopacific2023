{{-- @extends('layouts.app') --}}

<section style="padding:100px 0px; background-color:white;" id="contactUS">
    <div class="container" >
    @if(session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
        {{session()->get('message')}}
    </div>  
    @endif
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 border shadow text-center p-5 fw-bolder" style="background-color: white; ">
                <div>
                    <div class="h3" style="font-weight: bold; letter-spacing: 2px;">Contact Us</div>
                    <div class="pb-3 blue text-center ps-lg-5 pe-lg-5 mb-2" style="letter-spacing: 1px">Feel free to contact us anytime. We will get back to you as soon as we can!</div>
                    <form action="{{ route('sendQuery') }}" method="post">
                        @csrf
                        <div class="row d-flex justify-content-center mb-4">
                            <div class="col-12 ps-lg-5 pe-lg-5 text-start">
                                <label for="email" class="text-md-start fw-bold mb-2">Email address:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope-fill text-secondary"></i>
                                    </span>
                                    <input name="email" id="email "type="email" class="form-control" required placeholder="E-mail Address">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center mb-5">
                            <div class="col-12 ps-lg-5 pe-lg-5 text-start">
                                <label for="name" class="text-md-start fw-bold mb-2">Name:</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-person-fill text-secondary"></i>
                                    </span>
                                    <input name="name" id="name" type="text" class="form-control" required placeholder="Name">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center mb-5">
                            <div class="col-12 ps-lg-5 pe-lg-5 text-start">
                                <label for="query" class="text-md-start fw-bold mb-2">What is your question about?</label>
                                <textarea name="cust_query" id="cust_query" class="form-control" rows="5" placeholder="Your query..."></textarea>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-4">
                                <button class="login-button fw-bold" style="background-color: #F9CD1A; font-size:15px; letter-spacing:1px; padding:5px; border-radius:10px">Submit</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>