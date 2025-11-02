<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Laravel FormBuilder - README</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    code { background: #f4f4f4; padding: 2px 6px; border-radius: 4px; }
    pre { background: #1a1a1a; color: #f8f8f2; padding: 1rem; border-radius: 8px; overflow-x: auto; }
    .badge { display: inline-block; padding: 0.25em 0.6em; font-size: 75%; font-weight: 700; line-height: 1; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: 0.25rem; }
    .badge-success { background-color: #d4edda; color: #155724; }
    .badge-info { background-color: #d1ecf1; color: #0c5460; }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 leading-relaxed">

  <div class="max-w-4xl mx-auto p-6 md:p-10 bg-white shadow-lg rounded-lg mt-10">

    <header class="text-center mb-10">
      <h1 class="text-4xl font-bold text-indigo-700">Laravel FormBuilder</h1>
      <p class="text-lg text-gray-600 mt-2">A powerful, flexible Blade component for dynamic forms</p>

      <div class="mt-4 space-x-2">
        <img src="https://img.shields.io/github/stars/yourusername/FormBuilder?style=social" alt="Stars">
        <img src="https://img.shields.io/github/license/yourusername/FormBuilder" alt="License">
        <img src="https://img.shields.io/badge/Laravel-11%2B-brightgreen.svg" alt="Laravel">
      </div>
    </header>

    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Features</h2>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-gray-100">
              <th class="px-4 py-2 font-medium">Feature</th>
              <th class="px-4 py-2 font-medium">Supported</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr class="border-b"><td class="px-4 py-2">Dynamic field count (<code>count-input</code>)</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr class="border-b"><td class="px-4 py-2">Input types (<code>text</code>, <code>email</code>, etc.)</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr class="border-b"><td class="px-4 py-2">Required validation (<code>'true'</code> / <code>'false'</code>)</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr class="border-b"><td class="px-4 py-2">Custom placeholders</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr class="border-b"><td class="px-4 py-2">Unique <code>id</code> / <code>name</code> / submit button</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr class="border-b"><td class="px-4 py-2">Slot for custom content</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr class="border-b"><td class="px-4 py-2">Any HTTP method</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>@csrf</code> always enabled</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr class="border-b"><td class="px-4 py-2">Tailwind responsive</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
            <tr><td class="px-4 py-2">No external dependencies</td><td class="px-4 py-2"><span class="badge badge-success">Supported</span></td></tr>
          </tbody>
        </table>
      </div>
    </section>

    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Installation</h2>
      <ol class="list-decimal list-inside space-y-2 text-gray-700">
        <li>Copy files to your Laravel project:
          <pre class="mt-2"><code>app/View/Components/Forms/FormBuilder.php<br>resources/views/components/forms/form-builder.blade.php</code></pre>
        </li>
        <li><strong>Publish</strong> (optional):
          <pre class="mt-2"><code>php artisan vendor:publish --tag=form-builder</code></pre>
        </li>
      </ol>
    </section>

    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Quick Start</h2>
      <pre class="text-sm"><code>&lt;x-forms.form-builder
    :subject="'Contact Us'"
    :action="'/contact'"
    :method="'post'"
    :start-name-number-pk="1001"
    :count-input="3"
    :property-title-array="['Name', 'Email', 'Message']"
    :property-input-type-array="['text', 'email', 'textarea']"
    :property-input-required-array="['true', 'true', 'false']"
    :property-input-placeholder-array="['Your name', 'your@email.com', 'Your message...']"
    :submit-text="'Send Message'"
    :class-model="'space-y-6 p-6 bg-white rounded-lg shadow-md'"
&gt;

    &lt;p class="text-sm text-gray-500 mt-4 text-center"&gt;We'll reply within 24 hours&lt;/p&gt;

&lt;/x-forms.form-builder&gt;</code></pre>
    </section>

    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Parameters</h2>
      <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
          <thead>
            <tr class="bg-indigo-50">
              <th class="px-4 py-2">Parameter</th>
              <th class="px-4 py-2">Type</th>
              <th class="px-4 py-2">Default</th>
              <th class="px-4 py-2">Description</th>
            </tr>
          </thead>
          <tbody class="text-gray-700">
            <tr class="border-b"><td class="px-4 py-2"><code>subject</code></td><td>string</td><td>"Form"</td><td>Form title</td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>action</code></td><td>string</td><td>"#"</td><td>Form action URL</td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>method</code></td><td>string</td><td>"post"</td><td><code>get</code>, <code>post</code>, <code>put</code>, <code>delete</code></td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>class-model</code></td><td>string</td><td>"space-y-4"</td><td>Tailwind classes</td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>count-input</code></td><td>int</td><td>0</td><td>Number of fields</td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>start-name-number-pk</code></td><td>int</td><td>1234</td><td><strong>Unique ID base</strong></td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>property-title-array</code></td><td>array</td><td>[]</td><td>Field labels</td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>property-input-type-array</code></td><td>array</td><td>[]</td><td>Input types</td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>property-input-required-array</code></td><td>array</td><td>[]</td><td><code>['true', 'false']</code></td></tr>
            <tr class="border-b"><td class="px-4 py-2"><code>property-input-placeholder-array</code></td><td>array</td><td>[]</td><td>Placeholders</td></tr>
            <tr><td class="px-4 py-2"><code>submit-text</code></td><td>string</td><td>"Submit"</td><td>Button text</td></tr>
          </tbody>
        </table>
      </div>
    </section>

    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Important Notes</h2>
      <ul class="list-disc list-inside space-y-3 text-gray-700">
        <li><strong>Unique IDs</strong>: Use different <code>start-name-number-pk</code> for multiple forms.</li>
        <li><strong>Safe Arrays</strong>: <code>??</code> prevents <code>Undefined array key</code> errors.</li>
        <li><strong>Slot</strong>: Add custom content between fields and button.</li>
        <li><strong>HTTP Methods</strong>: <code>@csrf</code> always included.</li>
        <li><strong>Empty Form</strong>: <code>count-input="0"</code> for slot-only forms.</li>
      </ul>
    </section>

    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Real-World Examples</h2>
      <div class="space-y-6">
        <div>
          <h3 class="font-medium text-indigo-600">Report Form</h3>
          <pre class="text-xs"><code>&lt;x-forms.form-builder :subject="'Report Online News'" ... /&gt;</code></pre>
        </div>
        <div>
          <h3 class="font-medium text-indigo-600">Contact Form</h3>
          <pre class="text-xs"><code>&lt;x-forms.form-builder :subject="'Get in Touch'" ... /&gt;</code></pre>
        </div>
      </div>
    </section>

    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Security</h2>
      <ul class="list-disc list-inside space-y-2 text-gray-700">
        <li><code>@csrf</code> always enabled</li>
        <li>Unique IDs prevent conflicts</li>
        <li>No unsafe code</li>
        <li>Server-side validation recommended</li>
      </ul>
    </section>

    <section class="mb-12">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Customization</h2>
      <ul class="list-disc list-inside space-y-2 text-gray-700">
        <li>Style with <code>:class-model</code> or CSS</li>
        <li>Add <code>value</code> via JS</li>
        <li>Extend for <code>@error</code>, <code>disabled</code>, etc.</li>
      </ul>
    </section>

    <footer class="text-center py-6 text-gray-500 border-t">
      <p>Made with <span class="text-red-500">love</span> for Laravel developers</p>
      <p class="mt-2">
        <a href="https://github.com/yourusername/FormBuilder" class="text-indigo-600 hover:underline">
          GitHub: FormBuilder
        </a>
      </p>
      <p class="mt-1 text-sm">MIT License © <span id="year"></span> Your Name</p>
    </footer>

  </div>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
