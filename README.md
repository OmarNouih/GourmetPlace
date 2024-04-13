# GourmetPlace - Restaurant Website

Welcome to the official repository for GourmetPlace, a dynamic and interactive restaurant website designed using PHP, HTML, and CSS. This site includes several features to enhance the dining experience of our guests by providing detailed information online. This project is kept simple as it marks my first endeavor into web development, focusing on fundamental features and design.

![Restaurant Homepage](https://github.com/OmarNouih/GourmetPlace/blob/main/img/1.png)
*Image of the homepage of GourmetPlace*

## Features

- **Home**: The landing page that welcomes visitors and provides a brief introduction to our restaurant.
- **Reservation**: Allows customers to book tables online. Includes date, time, and special request options.
- **Menu**: Showcases our diverse culinary offerings with detailed descriptions and enticing images.
- **Events**: Information on upcoming events and special evenings hosted at the restaurant.
- **About Us**: Shares the story of our restaurant, our culinary philosophy, and introduces our team.
- **Config**: A back-end configuration page to manage website settings (not accessible to the public).

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

You will need:
- PHP 7.4 or newer.
- Apache or Nginx web server.
- MySQL or any preferred SQL database for managing reservations and menu items (optional).

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/GourmetPlace.git
   cd GourmetPlace
   ```

2. **Web Server Configuration**

   **For Apache Users:**
   Create a virtual host entry like below:
   ```apacheconf
   <VirtualHost *:80>
       ServerName gourmetplace.local
       DocumentRoot "/path/to/GourmetPlace"
       <Directory "/path/to/GourmetPlace">
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

   **For Nginx Users:**
   Set up a server block:
   ```nginx
   server {
       listen 80;
       server_name gourmetplace.local;
       root /path/to/GourmetPlace;
       index index.php;
       location / {
           try_files $uri $uri/ =404;
       }
       location ~ \.php$ {
           include snippets/fastcgi-php.conf;
           fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
       }
   }
   ```

3. **Start your web server** and visit `http://gourmetplace.local` in your browser to view the site.

## Built With

- **HTML** - Structure of the web pages.
- **CSS** - Styling of the web components.
- **PHP** - Backend logic and server-side integration.

## Authors

- **NOUIH Omar** - *Initial work* - [OmarNouih](https://github.com/OmarNouih)
