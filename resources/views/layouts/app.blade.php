<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Set the character set for the document -->
  <meta charset="UTF-8">
  <!-- Set the title of the document -->
  <title>Book Reviews</title>

  <!-- Include Tailwind CSS from CDN with specific plugins -->
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>

  <!-- Custom styles -->
  <style>
    /* Styles for buttons */
    .btn {
      background-color: white;
      border-radius: 0.375rem;
      padding: 0.5rem 1rem;
      text-align: center;
      font-weight: 500;
      color: #4b5563;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      border: 1px solid #cbd5e0;
      transition: background-color 0.3s ease-in-out;
      height: 2.5rem;
    }

    /* Styles for input elements */
    .input {
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      appearance: none;
      border: 1px solid #cbd5e0;
      width: 100%;
      padding: 0.5rem 0.75rem;
      font-size: 1rem;
      line-height: 1.25;
      border-radius: 0.375rem;
      outline: none;
    }

    /* Styles for filter container */
    .filter-container {
      margin-bottom: 1rem;
      display: flex;
      gap: 0.5rem;
      border-radius: 0.375rem;
      background-color: #edf2f7;
      padding: 0.5rem;
    }

    /* Styles for filter items */
    .filter-item {
      display: flex;
      width: 100%;
      align-items: center;
      justify-content: center;
      border-radius: 0.375rem;
      padding: 0.5rem 1rem;
      text-align: center;
      font-size: 1rem;
      font-weight: 500;
      color: #4b5563;
    }

    /* Styles for active filter item */
    .filter-item-active {
      background-color: white;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      color: #2d3748;
    }

    /* Styles for book items */
    .book-item {
      font-size: 0.875rem;
      border-radius: 0.375rem;
      background-color: white;
      padding: 1rem;
      line-height: 1.5;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
      border: 1px solid #cbd5e0;
      margin-bottom: 1rem;
    }

    /* Styles for book title */
    .book-title {
      font-size: 1.25rem;
      font-weight: 600;
      color: #2d3748;
      transition: color 0.3s ease-in-out;
    }

    /* Hover effect for book title */
    .book-title:hover {
      color: #4a5568;
    }

    /* Styles for book author */
    .book-author {
      display: block;
      color: #4a5568;
    }

    /* Styles for book rating */
    .book-rating {
      font-size: 1rem;
      font-weight: 500;
      color: #4b5563;
    }

    /* Styles for book review count */
    .book-review-count {
      font-size: 0.75rem;
      color: #4a5568;
    }

    /* Styles for empty book item */
    .empty-book-item {
      font-size: 0.875rem;
      border-radius: 0.375rem;
      background-color: white;
      padding: 1.25rem;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
      border: 1px solid #cbd5e0;
      margin-bottom: 1rem;
    }

    /* Styles for empty text */
    .empty-text {
      font-weight: 500;
      color: #4b5563;
    }

    /* Styles for reset link */
    .reset-link {
      color: #4a5568;
      text-decoration: underline;
    }

    /* Custom button styles */
    .custom-button {
      display: inline-block;
      padding: 8px 16px;
      text-decoration: none;
      color: white;
      background-color: royalblue;
      border-radius: 8px;
      transition: background-color 0.3s ease-in-out;
    }

    /* Text animation purpose */
    .custom-button:hover {
      background-color: darkblue;
    }
  
    .ml10 {
      position: relative;
      font-weight: 900;
      font-size: 2.5em; /* Adjust the font size to fit your layout */
    }

    .ml10 .text-wrapper {
      position: relative;
      display: inline-block;
      padding-top: 0.2em;
      padding-right: 0.05em;
      padding-bottom: 0.1em;
      overflow: hidden;
    }

    .ml10 .letter {
      display: inline-block;
      line-height: 1em;
      transform-origin: 0 0;
    }
  </style>
</head>

<body>
  <!-- Placeholder for content, to be filled by 'extending views' -->
  @yield('content') <!-- Define a section in a layout that can be replaced by the content from a child view -->
</body>

</html>
