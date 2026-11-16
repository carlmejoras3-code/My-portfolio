<?php
$name = "Carl Dominic   Mejoras";
$profilePhoto = "Carl.jpg";
$biography = "Carl Mejoras is a software developer with a passion for creating innovative solutions. He has experience in various programming languages and enjoys working on Front-End. In his free time, Carl likes to contribute to open-source projects and stay updated with the latest technology trends.";
$educationalBackground = "Carl Mejoras is studying a Bachelor's degree in BSIT from Mater Dei College.";
$skills = "PHP, JavaScript, HTML/CSS, MySQL";
$hobbies = "Editing, Eating, Sleeping, and Gaming";
$contact = "carlmejoras3@gmail.com";

function e($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

$cleanName = preg_replace('/\s+/', ' ', trim($name));
$skillList = array_map('trim', explode(',', $skills));
$hobbyList = array_map('trim', preg_split('/,\s*(?:and\s+)?/', $hobbies));
$hasPhoto  = file_exists(__DIR__ . '/' . $profilePhoto);
$initials  = '';
foreach (explode(' ', $cleanName) as $part) {
    $initials .= strtoupper($part[0]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo e($cleanName); ?> | Portfolio</title>

    <style>
        :root {
            --color-brand: #2563eb;
            --color-brand-dark: #1e40af;
            --color-brand-light: #dbeafe;
            --color-brand-pale: #eff6ff;
            --color-ink: #1e3a5f;
            --color-surface: #fff;
            --color-shadow: rgba(15, 23, 42, 0.18);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: linear-gradient(to bottom, #dbeafe, #f8fafc) fixed;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--color-ink);
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        header {
            background: var(--color-ink);
            color: var(--color-surface);
            padding: 20px;
            box-shadow: 0 4px 8px var(--color-shadow);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        header h1 {
            margin: 0 0 10px;
            color: var(--color-surface);
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        nav a {
            color: var(--color-ink);
            background: var(--color-surface);
            text-decoration: none;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 20px;
            transition: background 0.2s, color 0.2s;
        }

        nav a:hover,
        nav a:focus-visible {
            background: var(--color-brand);
            color: var(--color-surface);
            outline: none;
        }

        .card {
            max-width: 900px;
            margin: 60px auto;
            padding: 40px;
            border-radius: 40px;
            box-shadow: 0 4px 8px var(--color-shadow);
            text-align: center;
            font-size: 20px;
            scroll-margin-top: 130px;
        }

        .card h2 {
            margin: 0 0 15px;
            font-size: 26px;
        }

        .card p {
            margin: 0;
        }

        .root {
            background: linear-gradient(to right, var(--color-ink), #315c91);
            color: var(--color-surface);
        }

        .root img,
        .root .initials {
            width: 200px;
            height: 200px;
            border-radius: 20%;
            box-shadow: 0 4px 8px var(--color-shadow);
            object-fit: cover;
        }

        .root .initials {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--color-brand);
            font-size: 64px;
            font-weight: bold;
        }

        .name {
            background: linear-gradient(to right, var(--color-brand-dark), var(--color-brand));
            color: var(--color-surface);
        }

        .name p:first-child {
            font-size: 20px;
            opacity: 0.9;
        }

        .name p:last-child {
            font-weight: bold;
            font-size: 34px;
        }

        .about {
            background: linear-gradient(to right, var(--color-brand-light), #f8fafc);
            color: var(--color-ink);
        }

        .info {
            background: var(--color-surface);
            text-align: left;
            border-left: 12px solid var(--color-brand);
        }

        .chips {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 5px;
        }

        .chip {
            background: var(--color-brand-pale);
            color: var(--color-brand-dark);
            border: 2px solid var(--color-brand);
            border-radius: 20px;
            padding: 4px 16px;
            font-size: 17px;
            font-weight: 600;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            background: var(--color-brand);
            color: var(--color-surface);
            text-decoration: none;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 25px;
            transition: background 0.2s;
        }

        .btn:hover,
        .btn:focus-visible {
            background: var(--color-brand-dark);
            outline: 3px solid var(--color-brand-light);
        }

        footer {
            background: var(--color-ink);
            color: var(--color-surface);
            text-align: center;
            padding: 20px;
            margin-top: 60px;
            box-shadow: 0 -4px 8px var(--color-shadow);
        }

        @media (max-width: 700px) {
            .card {
                margin: 30px 16px;
                padding: 28px 20px;
                border-radius: 28px;
                font-size: 18px;
            }

            .name p:last-child {
                font-size: 26px;
            }

            .root img,
            .root .initials {
                width: 150px;
                height: 150px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            * {
                transition: none !important;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>My Portfolio</h1>

        <nav>
            <a href="#name">My Name</a>
            <a href="#about">About Me</a>
            <a href="#education">Education</a>
            <a href="#skills">Skills</a>
            <a href="#hobbies">Hobbies</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <main>
        <section class="card root">
            <?php if ($hasPhoto): ?>
                <img src="<?php echo e($profilePhoto); ?>" alt="Profile photo of <?php echo e($cleanName); ?>" width="200" height="200">
            <?php else: ?>
                <div class="initials" role="img" aria-label="Profile placeholder"><?php echo e($initials); ?></div>
            <?php endif; ?>
        </section>

        <section class="card name" id="name">
            <p>The name is:</p>
            <p><?php echo e($cleanName); ?></p>
        </section>

        <section class="card about" id="about">
            <h2>About Me</h2>
            <p><?php echo e($biography); ?></p>
        </section>

        <section class="card info education" id="education">
            <h2>Educational Background</h2>
            <p><?php echo e($educationalBackground); ?></p>
        </section>

        <section class="card info skills" id="skills">
            <h2>Skills</h2>
            <div class="chips">
                <?php foreach ($skillList as $skill): ?>
                    <span class="chip"><?php echo e($skill); ?></span>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="card info hobbies" id="hobbies">
            <h2>Hobbies and Interests</h2>
            <div class="chips">
                <?php foreach ($hobbyList as $hobby): ?>
                    <span class="chip"><?php echo e($hobby); ?></span>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="card info contact" id="contact">
            <h2>Contact Information</h2>
            <p><?php echo e($contact); ?></p>
            <a class="btn" href="mailto:<?php echo e($contact); ?>">Send an email</a>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> <?php echo e($cleanName); ?>. All rights reserved.</p>
    </footer>

</body>

</html>
