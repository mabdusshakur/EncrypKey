# EncrypKey

EncrypKey is a cutting-edge web and API service that revolutionizes license management. With its robust features and advanced security measures, EncrypKey empowers developers to build activation systems directly into their products and tools, ensuring secure access control and unlocking a world of possibilities.

## Features

- **Enhanced Security**: EncrypKey employs state-of-the-art security measures, including Hardware ID (HWID) verification, to ensure that licenses are only valid for a single device. This prevents unauthorized usage and protects your valuable intellectual property.
- **Granular Access Control**: Grant or revoke access to your products and tools with ease. EncrypKey's license management system allows you to define specific permissions and restrictions based on license verification, giving you full control over who can use your software.
- **Effortless License Management**: With EncrypKey, managing licenses has never been easier. The intuitive web-based user interface allows you to effortlessly monitor and manage all licenses, providing detailed information such as HWID, IP address, device name, MAC address, and more.
- **Flexible Expiration Control**: Customize the duration of license expiration to meet your specific needs. Whether you want to extend or shorten the validity period, EncrypKey gives you the flexibility to adapt to changing business requirements.
- **Wide Platform Support**: EncrypKey offers pre-ready templates for popular programming languages like C++, C#, Java, and more. This ensures seamless integration into your existing codebase, saving you time and effort.

## Getting Started

To harness the power of EncrypKey, follow these simple steps:

1. **Sign up**: Create an account on the EncrypKey website to get started.
2. **Generate API Key**: Obtain an API key for your application, enabling secure communication with the EncrypKey service.
3. **Install Client Library**: Integrate the EncrypKey client library into your preferred programming language, leveraging its powerful capabilities.
4. **Integrate and Customize**: Utilize the provided templates and comprehensive documentation to seamlessly integrate EncrypKey into your application. Customize the license verification process to align with your unique requirements.
5. **Test and Deploy**: Thoroughly test your application with the added license management capabilities provided by EncrypKey. Once satisfied, deploy your software confidently, knowing that your intellectual property is protected.

## Additional Details

- **API Integration**: EncrypKey offers a comprehensive API that allows you to seamlessly integrate its license management system into your own software or website. This grants you full control over the license verification process and enables you to tailor the user experience to your liking.
- **Web-based User Interface**: For those who prefer a ready-made solution, EncrypKey provides a pre-built web-based user interface. This intuitive interface allows you to effortlessly manage licenses, view license details, and perform other license management tasks without writing a single line of code.
- **Documentation and Support**: EncrypKey provides detailed documentation and exceptional support to assist you in effectively integrating and utilizing its services. Whether you have questions or need guidance, EncrypKey is there to support you every step of the way.

Start using EncrypKey today to fortify your software's security, streamline your license management process, and unlock new opportunities for growth.


## Installation

1. Clone the repository: `git clone https://github.com/mabdusshakur/EncrypKey.git`
2. Install dependencies: `composer install`
3. Set up your environment variables: Rename `.env.example` to `.env` and update the necessary values.
4. Configure your mail server: Open the `.env` file and update the `MAIL_*` variables with your mail server configurations.
5. Connect the database: Open the `.env` file and update the `DB_*` variables with your database connection details.
6. Generate an application key: `php artisan key:generate`
7. Run database migrations: `php artisan migrate`
8. Start the development server: `php artisan serve`


# API Reference

## Base URL

The base URL for all API endpoints is `http://127.0.0.1:8000/api`.

## License Check or Activation

Endpoint: `/check-license`

Method: `POST`

### Parameters

- `owner_id` (required): The ID of the owner.
- `secret` (required): The secret key for authentication.
- `name` (required): The name of the application.
- `license_key` (required): The license key to be checked or activated.
- `hwid` (nullable): The hardware ID of the device.
- `ip_address` (nullable): The IP address of the device.
- `mac_address` (nullable): The MAC address of the device.
- `country` (nullable): The country.
- `isp` (nullable): The ISP (Internet Service Provider).

### Responses

- If the owner ID is invalid:
    - Status: 404
    - Body:
        ```json
        {
            "status": "error",
            "message": "Owner not found"
        }
        ```

- If the secret and name of the application are invalid:
    - Status: 404
    - Body:
        ```json
        {
            "status": "error",
            "message": "Application not found"
        }
        ```

- If the owner does not have permission for this application:
    - Status: 404
    - Body:
        ```json
        {
            "status": "error",
            "message": "Owner does not have this application"
        }
        ```

- If the license key does not exist in the provided application:
    - Status: 404
    - Body:
        ```json
        {
            "status": "error",
            "message": "License not found"
        }
        ```

- If the license is banned:
    - Status: 404
    - Body:
        ```json
        {
            "status": "error",
            "message": "License is banned"
        }
        ```

- If the license is expired:
    - Status: 404
    - Body:
        ```json
        {
            "status": "error",
            "message": "License is expired"
        }
        ```

- If the license is already used on another device:
    - Status: 404
    - Body:
        ```json
        {
            "status": "error",
            "message": "License is already used on another device"
        }
        ```

- If the license is not used:
    - Status: 200
    - Body:
        ```json
        {
            "status": "success",
            "message": "License activated successfully on this device"
        }
        ```

- If the license is already used and the hardware ID matches:
    - Status: 200
    - Body:
        ```json
        {
            "status": "success",
            "message": "License is valid"
        }
        ```

## Additional API References

will be added soon
```
```

## Clients
```
[C# Example : ](https://github.com/mabdusshakur/EncrypKey-CS-Example/)
```
