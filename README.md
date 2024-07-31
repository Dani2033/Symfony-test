# Symfony Docker based

Started with [dunglas/symfony-docker](https://github.com/dunglas/symfony-docker), many thanks to them!

A [Docker](https://www.docker.com/)-based installer and runtime for the [Symfony](https://symfony.com) web framework,
with [FrankenPHP](https://frankenphp.dev) and [Caddy](https://caddyserver.com/) inside!

![CI](https://github.com/dunglas/symfony-docker/workflows/CI/badge.svg)

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --no-cache` to build fresh images
3. Run `docker compose up --pull always -d --wait` to set up and start a fresh Symfony project
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## License

Symfony Docker is available under the MIT License, so is this repo!

## Credits

[dunglas/symfony-docker](https://github.com/dunglas/symfony-docker) Created by [Kévin Dunglas](https://dunglas.dev), co-maintained by [Maxime Helias](https://twitter.com/maxhelias) and sponsored by [Les-Tilleuls.coop](https://les-tilleuls.coop).

This basic symfony project has been adapted to fulfill the requirements indicated [here](https://upmarket.slite.page/p/bz-n8I1VWOMQvo/Symfony-Assignment) or under the Project Scope down below  
by [Daniel Rubio Fernández](https://github.com/Dani2033)

## Project Scope
### Hotel Guest Registration Application

### Objective
Create an application that allows users to register guests at a hotel.

### Timeline
You will have 48 hours to complete this assignment.

### Application Components

#### Database
Store information of users allowed to use the API services.

#### REST API
Provide endpoints for user and guest management.

### Guest Attributes
- **Name**
- **Surname**
- **Date of Birth**
- **Gender (M/F/X)**
- **Passport Number**
- **Country**
- **User ID** (who registered the guest)
- **Registration ID**

### Registration Details
- **List of guests**
- **Check-in Date**
- **Check-out Date**

### Guest Registration Process (using REST API endpoints)

1. **User Login:** Users login using an email and password.
2. **Submit Guests:** Users submit a list of guests with check-in and check-out dates.
3. **Validation:** Immediate feedback is provided based on validation rules.

### Notes
- Data must be contextually validated for hotel guest registration.
- No frontend implementation is required, it is a REST API service so you must focus on the development of a solid API.

### Extra Features
- **Email Notification:** Implement an email system to notify users when a list of guests is submitted.
- **Rate Limiting:** To prevent abuse, implement rate limiting on the API that limits submissions to a maximum of 5 per minute.
- **Webhook:** Implement a webhook that, on every submission, sends the data to the following URL: `https://webhook.site/e517553c-6fcb-4ade-9524-208e2d6c4068`.

### Technical Requirements
- **Symfony (latest version)**
- **MySQL**
- **Platform API**

### Deliverables

1. **GitHub Repository:** Create a repository.
2. **Installation Instructions:** Clear, step-by-step guide on how to install the application.
3. **Demonstration Video:** A video demonstrating a client performing the guest registration process.

### Evaluation Criteria

- **Quality of Code:** Ensure the implementation is basic yet well-structured.
- **Documentation:** Provide comprehensive and clear documentation for easy verification in a local environment.
- **Punctuality:** Adhere to deadlines strictly; delays will not be tolerated.

### Additional Instructions

- **Code Quality:** Ensure the code respects SOLID principles.
- **Security:** Implement security best practices for user authentication and data handling.
- **API Documentation:** Use tools like Swagger to document the API endpoints.
