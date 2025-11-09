# Read Emails MCP

An AI-powered Model Context Protocol (MCP) server built with Laravel that enables Claude to create, read, and manage emails through a conversational interface.

## Overview

Read Emails MCP is a Laravel-based MCP server that exposes email management capabilities to Claude via two main tools:

- **Create Email**: Compose new emails with subject, body text, and recipient address
- **Read Email**: Retrieve and display the latest emails from the database

The server integrates with Laravel's mail system to queue and send emails via SMTP (Gmail configured by default), with full database persistence and background job processing.

## Features

- 💬 **AI-Powered Composition**: Let Claude help compose emails conversationally
- 📧 **Email Storage**: Persistent database storage for all emails
- 📋 **Email Templates**: Uses Laravel's view system for formatted emails
- 🧪 **Comprehensive Tests**: Full test coverage with Pest framework
- 🔐 **Validated Input**: Schema validation on all MCP tools

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- SQLite or MySQL

### Installation

```bash
# Clone the repository
git clone <repository-url>
cd ReadEmailsMCP

# Install PHP dependencies
composer install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database
php artisan migrate

# Install Node dependencies
npm install

# Build assets
npm run build
```

### Configuration

Configure your mail driver in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Your Name"
```

For Gmail, use an [App Password](https://support.google.com/accounts/answer/185833) instead of your regular password.

## Usage

#### Create Email

Claude can create new emails by invoking the `CreateEmailTool` with:

```json
{
  "email_subject": "Hello there",
  "email_text": "This is the email body content",
  "email_address": "recipient@example.com"
}
```

**Validation Rules:**
- `email_subject`: 1-150 characters (required)
- `email_text`: 1-300 characters (required)
- `email_address`: 5-150 characters (required)

#### Read Email

Claude can retrieve the latest 5 emails using the `ReadEmailTool` (no parameters required):

```json
{}
```

Returns formatted list of emails with subject, body, recipient, and creation timestamp.

### CLI Commands

#### Send Emails

Manually trigger email sending from the command line:

```bash
php artisan app:send-email-command
```

This command:
1. Fetches all unsent emails from the database
2. Queues them for sending
3. Marks them as sent

#### Development Server

Run the full development environment with server, queue listener, and logs:

```bash
composer run dev
```

This starts:
- Laravel development server (http://localhost:8000)
- Queue listener for background jobs
- Pail logs (real-time logs)
- Vite dev server (asset compilation)

## Testing

The project uses **Pest** for comprehensive testing.

## Technology Stack

- **Framework**: Laravel 12.0
- **PHP**: 8.2+
- **MCP Support**: Laravel MCP 0.3.0
- **Testing**: Pest 4.1
- **Database**: SQLite / MySQL
- **Queue**: Database driver
- **Mail**: SMTP (Gmail)
- **Frontend**: Vite + Tailwind CSS
- **Code Quality**: PHPStan, Pint, Rector

### Local Development

1. Start the development server:
   ```bash
   composer run dev
   ```

2. Visit http://localhost:8000

3. Access Claude Code integration through the MCP tools

### Database Migrations

Run migrations:

```bash
php artisan migrate
```
## Contributing

Contributions are welcome! Please ensure:

1. All tests pass (`composer run test`)
2. Code is properly formatted (`composer run lint`)
3. Static analysis passes (`composer run analyse`)
4. Commit messages are clear and descriptive

## License

MIT License - see LICENSE file for details

## Support

For issues, feature requests, or questions:

1. Check existing GitHub issues
2. Create a new issue with detailed information
3. Include error logs and test output
4. Describe the expected vs actual behavior

---
