# Revived-Landing

**Landing Page for Revived.club**

A sleek, responsive landing page built for Revived.club, designed to showcase features, capture leads, and serve as a modern first impression.


## Features

* Fully responsive (mobile / tablet / desktop) - WIP
* Smooth scrolling navigation
* Hero section with call to action
* Feature / benefits sections
* Contact / lead capture form
* Easy to brand / style (customizable theme)
* Lightweight and performant


## Tech Stack

* **Frontend**: Vuejs, Tailwindcss, Blade
* **Framework / Bundler**: Laravel

## Setup & Installation

1. **Clone the repository**

   ```bash
   git clone https://github.com/yyuhdev/Revived-Landing.git
   cd Revived-Landing
   ```

2. **Install dependencies**


   ```bash
   composer install
   ```

   ```bash
   npm install
   # or
   yarn install
   ```

3. **Configure environment**

   * If there’s an `.env.example`, copy it to `.env` and fill in the required values (e.g. API keys, form endpoints).
   * Example:

     ```
     API_URL=https://api.revived.club
     CONTACT_FORM_ENDPOINT=/api/contact
     ```

## Development

To run in development mode (with hot reload, etc.):

```bash
npm run dev
# or
yarn dev
```

Then open your browser at `http://localhost:8000` (or whatever port your dev server uses).


## Deployment

To build for production:

```bash
npm run build
# or
yarn build
```

## Contributing

Contributions are welcome! Here’s how to help:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/YourFeature`)
3. Make your changes & commit (write good commit messages)
4. Push to your fork, and open a Pull Request
5. Ensure code is clean, linted, and passes any tests

Please add descriptive PR titles and tests / screenshots if applicable.


## License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details.
