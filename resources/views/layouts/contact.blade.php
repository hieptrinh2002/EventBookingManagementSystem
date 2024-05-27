
<section class="contact-section section-padding" id="section_6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h2 class="text-center mb-4">Interested? Let's talk</h2>

                <nav class="d-flex justify-content-center">
                    <div class="nav nav-tabs align-items-baseline justify-content-center" id="nav-tab"
                        role="tablist">
                        <button class="nav-link active" id="nav-ContactForm-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-ContactForm" type="button" role="tab"
                            aria-controls="nav-ContactForm" aria-selected="false">
                            <h5>Contact Form</h5>
                        </button>

                        <button class="nav-link" id="nav-ContactMap-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-ContactMap" type="button" role="tab"
                            aria-controls="nav-ContactMap" aria-selected="false">
                            <h5>Google Maps</h5>
                        </button>
                    </div>
                </nav>

                <div class="tab-content shadow-lg mt-5" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-ContactForm" role="tabpanel"
                        aria-labelledby="nav-ContactForm-tab">
                        <form class="custom-form contact-form mb-5 mb-lg-0" action="#" method="post"
                            role="form">
                            <div class="contact-form-body">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="text" name="contact-name" id="contact-name"
                                            class="form-control" placeholder="Full name" required>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <input type="email" name="contact-email" id="contact-email"
                                            pattern="[^ @]*@[^ @]*" class="form-control"
                                            placeholder="Email address" required>
                                    </div>
                                </div>

                                <input type="text" name="contact-company" id="contact-company"
                                    class="form-control" placeholder="Company" required>

                                <textarea name="contact-message" rows="3" class="form-control"
                                    id="contact-message" placeholder="Message"></textarea>

                                <div class="col-lg-4 col-md-10 col-8 mx-auto">
                                    <button type="submit" class="form-control">Send message</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="nav-ContactMap" role="tabpanel"
                        aria-labelledby="nav-ContactMap-tab">
                        <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29974.469402870927!2d120.94861466021855!3d14.106066818082482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd777b1ab54c8f%3A0x6ecc514451ce2be8!2sTagaytay%2C%20Cavite%2C%20Philippines!5e1!3m2!1sen!2smy!4v1670344209509!5m2!1sen!2smy"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <!-- You can easily copy the embed code from Google Maps -> Share -> Embed a map // -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
