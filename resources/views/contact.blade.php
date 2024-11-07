@include('header')

@foreach ($banners as $banner)
    <section id="hero">
        <div class="container d-flex align-items-center justify-content-center"
            style="background-image: url({{ '/storage' . '/' . $banner->image_url[0] }}); background-repeat: no-repeat; background-size: cover; background-position: center;  height: 300px;">
            <div class="row align-items-center  ">
                <div class="col text-center ">
                    <h2 class="  text-light">{{ $banner->title }}</h2>

                </div>
            </div>
        </div>
    </section>
@endforeach

<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="bg-light rounded p-5 mb-5">
                        <h4 class="text-primary mb-4">Get in Touch</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Address</h4>
                                        <p class="mb-0">{{ setting('address.name') }} {{ setting('address.city') }} {{ setting('address.state') }} {{ setting('address.zip_code') }} </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Mail Us</h4>
                                        <p class="mb-0">{{ setting('contact.email') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fa fa-phone-alt fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>Telephone</h4>
                                        <p class="mb-0">{{ setting('contact.phone_number') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="contact-add-item">
                                    <div class="contact-icon text-primary mb-4">
                                        <i class="fab fa-firefox-browser fa-2x"></i>
                                    </div>
                                    <div>
                                        <h4>{{ setting('contact.email') }}</h4>
                                        <p class="mb-0">{{ setting('contact.phone_number') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light p-5 rounded h-100 wow fadeInUp" data-wow-delay="0.2s">
                        <h4 class="text-primary">Send Your Message</h4>
                        <p class="mb-4">The contact form is currently inactive. Get a functional and working contact
                            form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and
                            you're done. <a class="text-primary fw-bold"
                                href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                                <form id="contactForm">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" required>
                                
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" required>
                                
                                    <label for="phone">Phone:</label>
                                    <input type="text" name="phone" id="phone" required>
                                
                                    <label for="message">Message:</label>
                                    <textarea name="message" id="message" required></textarea>
                                
                                    <button type="submit">Submit</button>
                                </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="rounded h-100">
                    <iframe class="rounded h-100 w-100" style="height: 400px;"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14309.885122799385!2d73.0173027!3d26.2788179!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x647efbb48fe80c75!2sCADADDA!5e0!3m2!1sen!2sin!4v1580292602941!5m2!1sen!2sin"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('contactForm').addEventListener('submit', async function(event) {
        event.preventDefault();
    
        const formData = {
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            message: document.getElementById('message').value
        };
    
        try {
            const response = await fetch('/api/contact', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            });
    
            const data = await response.json();
    
            if (data.success) {
                alert('Form submitted successfully!');
            } else {
                alert('Form submission failed.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        }
    });
    </script>
@include('footer')
