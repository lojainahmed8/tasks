<?php

$messageSent = false;
$errors = [];
$formData = ['name' => '', 'email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData['name'] = trim($_POST['name'] ?? '');
    $formData['email'] = trim($_POST['email'] ?? '');
    $formData['message'] = trim($_POST['message'] ?? '');

    // Server-side Validation
    if (empty($formData['name'])) {
        $errors[] = "Name is required.";
    }
    if (empty($formData['email']) || !filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email address is required.";
    }
    if (empty($formData['message'])) {
        $errors[] = "Message cannot be empty.";
    }

    if (empty($errors)) {
        $messageSent = true;
    
        $formData = ['name' => '', 'email' => '', 'message' => ''];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Responsive Web Application</title>
    <style>
        /* CSS Variables & Theme Setup */
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg: #0f172a;
            --surface: #1e293b;
            --surface-card: #334155;
            --text: #f8fafc;
            --text-muted: #94a3b8;
            --success: #22c55e;
            --danger: #ef4444;
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header Navigation */
        header {
            background-color: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--text);
        }

        /* Hero Section */
        .hero {
            max-width: 1200px;
            margin: 0 auto;
            padding: 5rem 2rem 3rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #818cf8, #c084fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            color: var(--text-muted);
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto 2rem;
        }

        /* Main Content Grid */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            flex: 1;
        }

        @media (max-width: 768px) {
            .main-container {
                grid-template-columns: 1fr;
            }
            .hero h1 {
                font-size: 2.2rem;
            }
        }

        /* Cards & Section Styling */
        .card {
            background-color: var(--surface);
            border-radius: var(--radius);
            padding: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }

        .card h2 {
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            border-bottom: 2px solid var(--primary);
            padding-bottom: 0.5rem;
            display: inline-block;
        }

        /* Interactive Counter Section */
        .counter-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            height: 100%;
        }

        .display-number {
            font-size: 4rem;
            font-weight: 800;
            color: var(--primary);
        }

        .button-group {
            display: flex;
            gap: 1rem;
        }

        button, .btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        button:hover, .btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        button.btn-secondary {
            background-color: var(--surface-card);
        }

        button.btn-secondary:hover {
            background-color: #475569;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--bg);
            border: 1px solid var(--surface-card);
            border-radius: 8px;
            color: var(--text);
            font-size: 1rem;
            outline: none;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        /* Notifications */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-weight: 500;
        }

        .alert-success {
            background-color: rgba(34, 197, 94, 0.15);
            border: 1px solid var(--success);
            color: var(--success);
        }

        .alert-danger {
            background-color: rgba(239, 68, 68, 0.15);
            border: 1px solid var(--danger);
            color: var(--danger);
        }

        /* Footer */
        footer {
            background-color: var(--surface);
            text-align: center;
            padding: 1.5rem;
            margin-top: 3rem;
            color: var(--text-muted);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }
    </style>
</head>
<body>

    <header>
        <div class="nav-container">
            <a href="#" class="logo">⚡ PHP WebApp</a>
            <ul class="nav-links">
                <li><a href="#hero">Home</a></li>
                <li><a href="#interactive">Interactive</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </header>

    <section class="hero" id="hero">
        <h1>Full-Stack Single Page Architecture</h1>
        <p>A responsive application built with vanilla PHP, modern CSS grid layout, dynamic JavaScript state management, and form processing.</p>
    </section>

    <main class="main-container">
        
        <section class="card" id="interactive">
            <h2>Client-Side State</h2>
            <div class="counter-box">
                <p style="color: var(--text-muted);">Dynamic State Controller</p>
                <div class="display-number" id="counterValue">0</div>
                <div class="button-group">
                    <button id="decrementBtn" class="btn btn-secondary">- Decrement</button>
                    <button id="resetBtn" class="btn btn-secondary">Reset</button>
                    <button id="incrementBtn">+ Increment</button>
                </div>
            </div>
        </section>

        <section class="card" id="contact">
            <h2>Server-Side Contact</h2>

            <?php if ($messageSent): ?>
                <div class="alert alert-success">
                    ✅ Thank you! Your message has been sent successfully via PHP.
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul style="padding-left: 1rem;">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="#contact" method="POST" id="contactForm" novalidate>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($formData['name']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($formData['email']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required><?= htmlspecialchars($formData['message']) ?></textarea>
                </div>

                <button type="submit" style="width: 100%;">Send Message</button>
            </form>
        </section>

    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> Single Page Web Application. Powered by PHP & Native JS.</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // State Management Logic
            let count = 0;
            const counterDisplay = document.getElementById('counterValue');
            const incBtn = document.getElementById('incrementBtn');
            const decBtn = document.getElementById('decrementBtn');
            const resetBtn = document.getElementById('resetBtn');

            function updateDisplay() {
                counterDisplay.textContent = count;
                // Simple color toggle based on value
                if (count > 0) counterDisplay.style.color = '#22c55e';
                else if (count < 0) counterDisplay.style.color = '#ef4444';
                else counterDisplay.style.color = 'var(--primary)';
            }

            incBtn.addEventListener('click', () => {
                count++;
                updateDisplay();
            });

            decBtn.addEventListener('click', () => {
                count--;
                updateDisplay();
            });

            resetBtn.addEventListener('click', () => {
                count = 0;
                updateDisplay();
            });

            // Client-Side Validation Enhancement
            const form = document.getElementById('contactForm');
            form.addEventListener('submit', (e) => {
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const message = document.getElementById('message').value.trim();

                if (!name || !email || !message) {
                    alert('Please complete all required fields prior to submitting.');
                }
            });
        });
    </script>
</body>
</html>