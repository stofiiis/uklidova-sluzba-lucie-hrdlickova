
Built by https://www.blackbox.ai

---

# Úklidová služba Lucie Hrdličková

## Project Overview
Úklidová služba Lucie Hrdličková is a professional cleaning service website providing information about various cleaning services, including residential and commercial cleaning. This project consists of a landing page, service details, pricing, testimonials, a contact form, and an AJAX-based email submission system to enhance user experience.

## Installation
To run this project locally, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/uklidova-sluzba.git
    cd uklidova-sluzba
    ```

2. Open the `index.html` file in your preferred web browser.

> Note: Ensure that you have a PHP server running to test the email submission feature, as it uses a PHP backend (`send_email.php`).

## Usage
- Open `index.html` in your web browser to view the site.
- Navigate using the menu or scroll down to explore various sections including Services, Pricing, Testimonials, About Us, and Contact Us.
- To request a cleaning service, fill out the contact form and submit.

## Features
- **Responsive Design**: The website is fully responsive and adapts to various screen sizes.
- **Mobile Menu Toggle**: The navigation menu can be toggled for mobile viewing.
- **AJAX Contact Form**: The contact form can submit requests without refreshing the page.
- **Smooth Scrolling**: Smooth scrolling for anchor links improves user navigation.
- **Sticky Header**: The header stays fixed at the top for easy access to the navigation menu.
- **Testimonials Slider**: A slider displays client testimonials, showcasing customer satisfaction.
- **Gallery Section**: Examples of previous work are displayed in a visually appealing grid format.

## Dependencies
The project utilizes the following external libraries and frameworks:
- **Font Awesome**: For icons in the UI.
- **Google Fonts**: For custom font styles (Montserrat and Poppins).
- **Fetch API**: For handling AJAX requests.

## Project Structure
```
uklidova-sluzba/
│
├── index.html            # Main webpage
├── sluzby.html           # Services page
├── send_email.php        # PHP script for handling contact form requests
├── script.js             # JavaScript to add interactivity
├── styles.css            # CSS styles for the webpages
└── logo.png              # Logo image used in the website
```
- **index.html**: The main landing page with sections like services, testimonials, pricing, and contact.
- **sluzby.html**: A detailed services page with pricing information.
- **send_email.php**: Handles the AJAX requests for the contact form.
- **script.js**: Contains the JavaScript code for interactivity, including menu toggle, form submission, and smooth scrolling.
- **styles.css**: Contains all CSS styling for the website.
- **logo.png**: The logo image displayed in the header and footer.

## License
This project is open-source and available under the MIT License. Feel free to modify and distribute as per the terms of the license.