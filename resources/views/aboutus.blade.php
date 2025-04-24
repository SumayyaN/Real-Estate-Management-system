<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Coderants Real Estate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e4376;
            --secondary-color: #2b5876;
            --accent-color: #6a5acd;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            opacity: 0.1;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 30px;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--accent-color);
        }
        
        .icon-box {
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            transition: all 0.3s ease;
        }
        
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .feature-card:hover .icon-box {
            transform: rotate(10deg) scale(1.1);
            background: rgba(78, 67, 118, 0.2) !important;
        }
        
        .team-card {
            position: relative;
            padding: 30px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 20px;
        }
        
        .team-card img {
            border: 5px solid #f8f9fa;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .team-card:hover img {
            transform: scale(1.05);
        }
        
        .stats-section {
            background: linear-gradient(135deg, var(--secondary-color) 0%, var(--primary-color) 100%);
            position: relative;
        }
        
        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            opacity: 0.1;
        }
        
        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            padding: 10px 25px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .lead {
            font-size: 1.2rem;
            font-weight: 300;
        }
        
        .text-muted {
            color: #6c757d !important;
        }
        
        .rounded-lg {
            border-radius: 15px !important;
        }
        
        .shadow-soft {
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .contact-section {
            background: #f8f9fa;
            position: relative;
        }
        
        .contact-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .contact-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--accent-color);
            color: white;
            border-radius: 50%;
            margin-right: 15px;
            transition: all 0.3s ease;
        }
        
        .contact-icon:hover {
            background: var(--primary-color);
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="about-us-page">
        <!-- Hero Section -->
        <section class="hero-section text-white py-5">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 fw-bold mb-4">About Coderants Real Estate</h1>
                        <p class="lead mb-4">Transforming real estate management with innovative technology solutions.</p>
                    </div>
                    <div class="col-lg-6">
                        <!-- Image removed -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Story -->
        <section class="py-5">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="section-title mb-5">Our Story</h2>
                        <p class="text-muted mb-4">Founded in 2023, Coderants Real Estate began with a simple mission: to revolutionize property management through cutting-edge technology. What started as a small team of passionate developers and real estate experts has grown into a comprehensive platform serving clients nationwide.</p>
                        <p class="text-muted">We combine deep industry knowledge with technical expertise to create solutions that simplify complex real estate operations, saving time and increasing profitability for our clients.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-5 bg-light">
            <div class="container py-5">
                <h2 class="section-title text-center mb-5">Why Choose Coderants?</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card feature-card h-100">
                            <div class="card-body text-center p-4">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle mb-4">
                                    <i class="fas fa-bolt fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Powerful Technology</h5>
                                <p class="text-muted">Our platform leverages the latest web technologies to deliver fast, reliable performance.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card feature-card h-100">
                            <div class="card-body text-center p-4">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle mb-4">
                                    <i class="fas fa-shield-alt fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Secure & Compliant</h5>
                                <p class="text-muted">We prioritize data security and ensure compliance with all real estate regulations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card feature-card h-100">
                            <div class="card-body text-center p-4">
                                <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle mb-4">
                                    <i class="fas fa-headset fa-2x"></i>
                                </div>
                                <h5 class="mb-3">Dedicated Support</h5>
                                <p class="text-muted">Our expert support team is available to help you maximize the platform's potential.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="py-5">
            <div class="container py-5">
                <h2 class="section-title text-center mb-5">Meet Our Team</h2>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="team-card text-center">
                            <!-- Image removed -->
                            <h5 class="mt-3">Alex Johnson</h5>
                            <p class="text-muted">CEO & Founder</p>
                            <p class="small">15+ years in real estate technology</p>
                            <div class="social-links mt-3">
                                <a href="#" class="text-primary mx-2"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-primary mx-2"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-card text-center">
                            <!-- Image removed -->
                            <h5 class="mt-3">Sarah Williams</h5>
                            <p class="text-muted">CTO</p>
                            <p class="small">Software architect & Laravel expert</p>
                            <div class="social-links mt-3">
                                <a href="#" class="text-primary mx-2"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-primary mx-2"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="team-card text-center">
                            <!-- Image removed -->
                            <h5 class="mt-3">Michael Chen</h5>
                            <p class="text-muted">Head of Operations</p>
                            <p class="small">Real estate management specialist</p>
                            <div class="social-links mt-3">
                                <a href="#" class="text-primary mx-2"><i class="fab fa-linkedin"></i></a>
                                <a href="#" class="text-primary mx-2"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-5 stats-section text-white">
            <div class="container py-5">
                <div class="row g-4 text-center">
                    <div class="col-md-3">
                        <h3 class="display-4 fw-bold">500+</h3>
                        <p class="mb-0">Properties Managed</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="display-4 fw-bold">50+</h3>
                        <p class="mb-0">Happy Clients</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="display-4 fw-bold">99.9%</h3>
                        <p class="mb-0">Uptime</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="display-4 fw-bold">24/7</h3>
                        <p class="mb-0">Support</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Us Section -->
        <section class="py-5 contact-section">
            <div class="container py-5">
                <h2 class="section-title text-center mb-5">Contact Us</h2>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <div class="contact-card text-center shadow-soft">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <div class="contact-icon">
                                    <i class="fas fa-phone fa-lg"></i>
                                </div>
                                <h5 class="mb-0">Phone</h5>
                            </div>
                            <p class="text-muted mb-2">Call us for immediate assistance</p>
                            <a href="tel:+1-800-555-1234" class="text-primary fw-bold">+1-800-555-1234</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-card text-center shadow-soft">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope fa-lg"></i>
                                </div>
                                <h5 class="mb-0">Email</h5>
                            </div>
                            <p class="text-muted mb-2">Send us your inquiries</p>
                            <a href="mailto:support@coderants.com" class="text-primary fw-bold">support@coderants.com</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-card text-center shadow-soft">
                            <div class=" negoc align-items-center justify-content-center mb-3">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt fa-lg"></i>
                                </div>
                            </div>
                            <p class="text-primary fw-bold">123 Tech Lane, Suite 100<br>San Francisco, CA 94105</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="mb-4">Ready to Transform Your Real Estate Management?</h2>
                        <p class="lead text-muted mb-4">Discover how Coderants can streamline your operations and boost your business.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple animation for stats counting
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.stats-section h3');
            const speed = 200;
            
            counters.forEach(counter => {
                const target = +counter.innerText.replace(/[^0-9]/g, '');
                const count = +counter.innerText.replace(/[^0-9]/g, '');
                const increment = target / speed;
                
                if(counter.innerText.includes('+')) {
                    let current = 0;
                    const updateCount = () => {
                        current += increment;
                        if(current < target) {
                            counter.innerText = Math.floor(current) + '+';
                            setTimeout(updateCount, 1);
                        } else {
                            counter.innerText = target + '+';
                        }
                    };
                    updateCount();
                } else if(counter.innerText.includes('%')) {
                    let current = 0;
                    const updateCount = () => {
                        current += increment;
                        if(current < target) {
                            counter.innerText = current.toFixed(1) + '%';
                            setTimeout(updateCount, 1);
                        } else {
                            counter.innerText = target + '%';
                        }
                    };
                    updateCount();
                }
            });
        });
    </script>
</body>
</html>