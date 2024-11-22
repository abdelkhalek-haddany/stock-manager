# Stock Manager - Real-Time Notifications and Performance Optimization

## 📖 Description

Stock Manager is a Laravel application designed to manage product stock in a warehouse. It features **real-time notifications** when stock reaches or falls below a critical threshold. The app leverages **Pusher** and **Laravel Echo** for real-time updates and using **JWT** for authentication and uses **eager loading** to optimize SQL queries, ensuring high performance.

---

## 🚀 Features

### Core Functionalities

-   **CRUD Operations**:
    -   Manage stock products with attributes like:
        -   **Name**
        -   **Quantity in Stock**
        -   **Minimum Stock Level**
-   **Real-Time Notification System**:
    -   Automatically sends notifications when:
        -   Stock reaches or drops below the minimum threshold.
    -   Powered by **Pusher** and **Laravel Echo**.
-   **Performance Optimization**:
    -   Uses **eager loading** to minimize database queries and improve performance.

### Bonus Features

-   **Email Notifications**:
    -   Sends email alerts for critical stock levels.
-   **Admin Dashboard**:
    -   Manage products and monitor statistics in real-time.
-   **Export to Excel**:
    -   Download stock data as an Excel file.

---

## 📥 Installation

### Prerequisites

Ensure you have the following installed:

-   PHP >= 8.0
-   Composer
-   Node.js and npm
-   MySQL (or SQLite for testing)
-   Pusher credentials (sign up at [Pusher](https://pusher.com))

### Steps

1. **Clone the Repository**:

    ```bash
    git clone https://github.com/abdelkhalek-haddany/stock-manager.git
    cd stock-manager
    ```

    ## 📥 Installation

### Prerequisites

Ensure you have the following installed:

-   PHP >= 8.0
-   Composer
-   Node.js and npm
-   MySQL (or SQLite for testing)
-   Pusher credentials (sign up at [Pusher](https://pusher.com))

### Steps

1. **Install Dependencies**:
    ```bash
    composer install
    npm install && npm run dev
    ```

````
2. **Setup Environment Variables**:
   - Copy the example `.env` file to create your environment configuration:
     ```bash
     cp .env.example .env
     ```
   - Open the `.env` file and configure the following variables:

   #### Database Configuration
   Replace with your database details:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
````

3. **Pusher Configuration**:

    - To enable real-time notifications, you need to set up Pusher. Follow these steps:

        1. Go to [Pusher's website](https://pusher.com) and create a free account.
        2. Create a new app in your Pusher dashboard:
            - Select the "Channels" product.
            - Choose a name for your app, like `StockManager`.
            - Select your app cluster (e.g., `mt1`).
            - Leave other settings as default and create the app.
        3. Copy the **App ID**, **Key**, **Secret**, and **Cluster** from the app's dashboard.

    - Add these credentials to the `.env` file in your project:

        ```env
        BROADCAST_DRIVER=pusher
        PUSHER_APP_ID=your_pusher_app_id
        PUSHER_APP_KEY=your_pusher_app_key
        PUSHER_APP_SECRET=your_pusher_app_secret
        PUSHER_APP_CLUSTER=your_pusher_app_cluster
        ```

    - Make sure broadcasting is set to use Pusher:

        ```env
        BROADCAST_DRIVER=pusher
        ```

    - Run the following command to clear the configuration cache and apply the updated settings:
        ```bash
        php artisan config:cache
        ```

4. **Run Laravel Echo Server** _(Optional)_:
    - If you're using **Laravel Echo Server** instead of directly using Pusher:
        1. Install the Laravel Echo Server globally:
            ```bash
            npm install -g laravel-echo-server
            ```
        2. Initialize the server in your project:
            ```bash
            laravel-echo-server init
            ```
        3. Configure the `laravel-echo-server.json` file based on your `.env` setup.
        4. Run the Echo server:
            ```bash
            laravel-echo-server start
            ```

With this setup, your app is ready to broadcast notifications using Pusher or Laravel Echo!
