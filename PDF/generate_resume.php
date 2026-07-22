<?php
require_once __DIR__ . '/../fpdf/fpdf.php';

// ============================================
// RESUME DATA
// ============================================

$name = 'John Kenneth Araojo';
$title = 'Developer & IT Support Specialist';
$tagline = 'Computer Science Graduate · Web Developer · QA Enthusiast';

$email = 'johnkennetho.araojo@gmail.com';
$phone = '09455130807';
$location = 'Muntinlupa City, Metro Manila, Philippines';
$about = 'Computer Science graduate with hands-on experience in full-stack web development, database management, software testing, and IT support. Proven ability to build responsive applications with React, Laravel, PHP, and MySQL while delivering reliable technical support and collaborating effectively across teams. Motivated to contribute clean code, user-focused solutions, and continuous improvement in fast-paced environments.';

$education = [
    [
        'school' => 'Adamson University',
        'degree' => 'Bachelor of Science in Computer Science',
        'dates' => '2021 – 2026',
    ],
];

$experience = [
    [
        'role' => 'Developer & IT Support Intern',
        'company' => 'Company Name',
        'dates' => '2026',
        'bullets' => [
            'Provided tier-1/2 technical support and resolved hardware, software, and network issues for end users.',
            'Assisted in developing and maintaining internal web applications using PHP, JavaScript, and MySQL.',
            'Collaborated with developers to debug systems, document fixes, and improve application reliability.',
            'Supported deployment, testing, and user onboarding to enhance overall operational efficiency.',
        ],
    ],
    [
        'role' => 'Web Development Projects',
        'company' => 'Academic & Personal',
        'dates' => '2022 – Present',
        'bullets' => [
            'Designed and built full-stack web systems including inventory, event, and help desk platforms.',
            'Implemented responsive UI, RESTful integrations, and database-driven features with Laravel and React.',
            'Applied QA practices including functional testing, validation workflows, and issue tracking.',
        ],
    ],
];

$projects = [
    [
        'title' => 'Sentiment Analysis System',
        'tags' => ['Python', 'TensorFlow', 'Keras', 'AI/ML'],
        'desc' => 'Built an AI-powered sentiment analysis pipeline using the GoEmotions dataset with model training, evaluation, and text classification output.',
    ],
    [
        'title' => 'Help Desk Management System',
        'tags' => ['PHP', 'MySQL', 'JavaScript', 'Bootstrap'],
        'desc' => 'Developed a ticket-based IT support platform with role-based access, status tracking, and admin dashboards for issue resolution.',
    ],
    [
        'title' => 'Event Management System',
        'tags' => ['Laravel', 'MySQL', 'PHP'],
        'desc' => 'Created a centralized event scheduling platform with participant management, event tracking, and reporting features.',
    ],
    [
        'title' => 'Stock Management System',
        'tags' => ['PHP', 'MySQL', 'JavaScript'],
        'desc' => 'Engineered an inventory solution for stock monitoring, product movement logs, and automated low-stock alerts with reporting.',
    ],
    [
        'title' => 'Unity 2D Game',
        'tags' => ['Unity', 'C#', 'Game Dev'],
        'desc' => 'Designed and programmed a 2D game with player mechanics, collision handling, scoring systems, and polished UI flow.',
    ],
];

$skillGroups = [
    'Frontend' => ['HTML', 'CSS', 'JavaScript', 'React', 'Vite', 'Responsive Design', 'Figma'],
    'Backend & Data' => ['PHP', 'Laravel', 'Node.js', 'MySQL', 'SQL', 'REST APIs'],
    'Languages' => ['JavaScript', 'PHP', 'Python', 'Java', 'C#', 'SQL'],
    'Tools & QA' => ['Git', 'Software Testing', 'Quality Assurance', 'Mobile Development'],
];

$learning = ['Firebase', 'React Native', 'Advanced Backend APIs'];

$qualities = [
    'Problem Solving', 'Analytical Thinking', 'Team Collaboration',
    'Adaptability', 'Attention to Detail', 'Communication',
    'Continuous Learning', 'Time Management',
];

$certifications = [
    ['name' => 'SQL Certification', 'issuer' => 'FreeCodeCamp'],
    ['name' => 'Web Development Fundamentals', 'issuer' => 'Sololearn'],
    ['name' => 'Cybersecurity Certification', 'issuer' => 'Certiport'],
    ['name' => 'Networking Certification', 'issuer' => 'Certiport'],
];

$photoPath = __DIR__ . '/../src/assets/hero-image.png';

// ============================================
// DESIGN TOKENS
// ============================================

$C = [
    'navy'      => [30, 41, 59],
    'navyLight' => [51, 65, 85],
    'accent'    => [79, 70, 229],
    'accentSoft'=> [238, 242, 255],
    'ink'       => [15, 23, 42],
    'body'      => [71, 85, 105],
    'muted'     => [148, 163, 184],
    'line'      => [226, 232, 240],
    'white'     => [255, 255, 255],
    'paper'     => [248, 250, 252],
];

$sidebarW = 62;
$pageW = 210;
$pageH = 297;
$mainX = $sidebarW + 12;
$mainW = $pageW - $mainX - 12;
$sidebarPad = 8;

// ============================================
// DRAW HELPERS
// ============================================

function setFill($pdf, $color)
{
    $pdf->SetFillColor($color[0], $color[1], $color[2]);
}

function setDraw($pdf, $color, $width = 0.2)
{
    $pdf->SetDrawColor($color[0], $color[1], $color[2]);
    $pdf->SetLineWidth($width);
}

function setText($pdf, $color)
{
    $pdf->SetTextColor($color[0], $color[1], $color[2]);
}

function drawSidebarBackground($pdf, $sidebarW, $pageH, $C)
{
    setFill($pdf, $C['navy']);
    $pdf->Rect(0, 0, $sidebarW, $pageH, 'F');

    setFill($pdf, $C['accent']);
    $pdf->Rect(0, 0, 3, $pageH, 'F');
}

function drawPageFooter($pdf, $name, $pageNum, $C, $sidebarW)
{
    $footerW = 198 - $sidebarW - 12;
    $y = 287;

    setDraw($pdf, $C['line'], 0.15);
    $pdf->Line($sidebarW + 12, $y, 198, $y);

    setText($pdf, $C['muted']);
    $pdf->SetFont('Helvetica', '', 7.5);
    $pdf->SetXY($sidebarW + 12, $y + 2);
    $pdf->Cell($footerW, 4, $name . '  ·  Resume', 0, 0, 'L');
    $pdf->Cell(0, 4, 'Page ' . $pageNum, 0, 0, 'R');
}

function drawSidebarTitle($pdf, $x, $y, $title, $width, $C)
{
    $pdf->SetXY($x, $y);
    setText($pdf, $C['white']);
    $pdf->SetFont('Helvetica', 'B', 8.5);
    $pdf->Cell($width, 4, strtoupper($title), 0, 1, 'L');

    setDraw($pdf, $C['accent'], 0.6);
    $pdf->Line($x, $y + 5.5, $x + 18, $y + 5.5);

    return $y + 9;
}

function drawSidebarText($pdf, $x, $y, $text, $width, $C, $size = 8.2)
{
    $pdf->SetXY($x, $y);
    setText($pdf, [226, 232, 240]);
    $pdf->SetFont('Helvetica', '', $size);
    $pdf->MultiCell($width, 4.2, $text, 0, 'L');

    return $pdf->GetY() + 4;
}

function drawSidebarLabelValue($pdf, $x, $y, $label, $value, $width, $C)
{
    $pdf->SetXY($x, $y);
    setText($pdf, $C['muted']);
    $pdf->SetFont('Helvetica', 'B', 7);
    $pdf->Cell($width, 3.5, strtoupper($label), 0, 1);

    $pdf->SetX($x);
    setText($pdf, [241, 245, 249]);
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->MultiCell($width, 4, $value, 0, 'L');

    return $pdf->GetY() + 3;
}

function drawMainSection($pdf, $x, $y, $title, $width, $C)
{
    setFill($pdf, $C['accentSoft']);
    $pdf->Rect($x, $y, 3, 7, 'F');

    $pdf->SetXY($x + 6, $y);
    setText($pdf, $C['ink']);
    $pdf->SetFont('Helvetica', 'B', 11.5);
    $pdf->Cell($width - 6, 7, strtoupper($title), 0, 1);

    setDraw($pdf, $C['line'], 0.2);
    $pdf->Line($x, $y + 9, $x + $width, $y + 9);

    return $y + 13;
}

function drawBodyText($pdf, $x, $y, $text, $width, $C, $size = 9.3)
{
    $pdf->SetXY($x, $y);
    setText($pdf, $C['body']);
    $pdf->SetFont('Helvetica', '', $size);
    $pdf->MultiCell($width, 4.6, $text, 0, 'L');

    return $pdf->GetY() + 2;
}

function drawExperienceBlock($pdf, $x, $y, $job, $width, $C)
{
    $pdf->SetXY($x, $y);
    setText($pdf, $C['ink']);
    $pdf->SetFont('Helvetica', 'B', 10);
    $pdf->Cell($width * 0.62, 5, $job['role'], 0, 0, 'L');

    setText($pdf, $C['accent']);
    $pdf->SetFont('Helvetica', 'B', 8.5);
    $pdf->Cell($width * 0.38, 5, $job['dates'], 0, 1, 'R');

    $pdf->SetX($x);
    setText($pdf, $C['body']);
    $pdf->SetFont('Helvetica', 'I', 8.8);
    $pdf->Cell($width, 4.5, $job['company'], 0, 1);

    $y = $pdf->GetY() + 1;
    foreach ($job['bullets'] as $bullet) {
        $pdf->SetXY($x + 2, $y);
        setText($pdf, $C['accent']);
        $pdf->SetFont('Helvetica', 'B', 9);
        $pdf->Cell(4, 4.5, chr(149), 0, 0);

        $pdf->SetXY($x + 6, $y);
        setText($pdf, $C['body']);
        $pdf->SetFont('Helvetica', '', 8.8);
        $pdf->MultiCell($width - 6, 4.3, $bullet, 0, 'L');
        $y = $pdf->GetY() + 1;
    }

    return $y + 3;
}

function drawProjectBlock($pdf, $x, $y, $project, $width, $C)
{
    $pdf->SetXY($x, $y);
    setText($pdf, $C['ink']);
    $pdf->SetFont('Helvetica', 'B', 10);
    $pdf->Cell($width, 5, $project['title'], 0, 1);

    $y = $pdf->GetY() + 1;
    if (!empty($project['tags'])) {
        $tagX = $x;
        $pdf->SetFont('Helvetica', '', 7.2);
        foreach ($project['tags'] as $tag) {
            $tagW = $pdf->GetStringWidth($tag) + 6;
            if ($tagX + $tagW > $x + $width) {
                $tagX = $x;
                $y += 5.5;
            }
            setFill($pdf, $C['accentSoft']);
            setDraw($pdf, $C['line'], 0.15);
            $pdf->Rect($tagX, $y, $tagW, 4.8, 'DF');
            $pdf->SetXY($tagX + 3, $y + 0.6);
            setText($pdf, $C['accent']);
            $pdf->Cell($tagW - 6, 3.5, $tag, 0, 0);
            $tagX += $tagW + 2;
        }
        $y += 7;
    }

    return drawBodyText($pdf, $x, $y, $project['desc'], $width, $C, 8.8) + 2;
}

function drawSkillGroup($pdf, $x, $y, $label, $items, $width, $C)
{
    $pdf->SetXY($x, $y);
    setText($pdf, $C['ink']);
    $pdf->SetFont('Helvetica', 'B', 8.5);
    $pdf->Cell($width, 4, $label, 0, 1);

    $pdf->SetX($x);
    setText($pdf, $C['body']);
    $pdf->SetFont('Helvetica', '', 8.5);
    $pdf->MultiCell($width, 4.2, implode('   ·   ', $items), 0, 'L');

    return $pdf->GetY() + 3;
}

function drawCertRow($pdf, $x, $y, $cert, $width, $C)
{
    $pdf->SetXY($x, $y);
    setText($pdf, $C['accent']);
    $pdf->SetFont('Helvetica', 'B', 8.5);
    $pdf->Cell(4, 4.5, chr(149), 0, 0);

    $pdf->SetXY($x + 5, $y);
    setText($pdf, $C['ink']);
    $pdf->SetFont('Helvetica', 'B', 9);
    $pdf->Cell($width * 0.55, 4.5, $cert['name'], 0, 0);

    setText($pdf, $C['body']);
    $pdf->SetFont('Helvetica', '', 8.5);
    $pdf->Cell($width * 0.4, 4.5, $cert['issuer'], 0, 1, 'R');

    return $pdf->GetY() + 2.5;
}

// ============================================
// BUILD PDF
// ============================================

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();

drawSidebarBackground($pdf, $sidebarW, $pageH, $C);

// --- Sidebar: photo & identity ---
$photoY = 14;
if (file_exists($photoPath)) {
    $photoSize = 36;
    $photoX = ($sidebarW - $photoSize) / 2 + 1.5;

    setFill($pdf, $C['white']);
    $pdf->Rect($photoX - 2, $photoY - 2, $photoSize + 4, $photoSize + 4, 'F');
    setDraw($pdf, $C['accent'], 0.5);
    $pdf->Rect($photoX - 2, $photoY - 2, $photoSize + 4, $photoSize + 4);

    $pdf->Image($photoPath, $photoX, $photoY, $photoSize, $photoSize);
    $photoY += $photoSize + 8;
} else {
    $photoY = 20;
}

$pdf->SetXY($sidebarPad, $photoY);
setText($pdf, $C['white']);
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->Cell($sidebarW - ($sidebarPad * 2), 5, 'John Kenneth', 0, 1, 'C');
$pdf->SetX($sidebarPad);
$pdf->Cell($sidebarW - ($sidebarPad * 2), 5, 'Araojo', 0, 1, 'C');

$pdf->SetX($sidebarPad);
setText($pdf, $C['muted']);
$pdf->SetFont('Helvetica', '', 7.5);
$pdf->MultiCell($sidebarW - ($sidebarPad * 2), 3.8, $tagline, 0, 'C');

// --- Sidebar sections ---
$sy = $photoY + 16;
$sw = $sidebarW - ($sidebarPad * 2);

$sy = drawSidebarTitle($pdf, $sidebarPad, $sy, 'Contact', $sw, $C);
$sy = drawSidebarLabelValue($pdf, $sidebarPad, $sy, 'Phone', $phone, $sw, $C);
$sy = drawSidebarLabelValue($pdf, $sidebarPad, $sy, 'Email', $email, $sw, $C);
$sy = drawSidebarLabelValue($pdf, $sidebarPad, $sy, 'Location', $location, $sw, $C);
$sy += 2;

$sy = drawSidebarTitle($pdf, $sidebarPad, $sy, 'Education', $sw, $C);
foreach ($education as $edu) {
    $sy = drawSidebarText($pdf, $sidebarPad, $sy, $edu['school'] . "\n" . $edu['degree'] . "\n" . $edu['dates'], $sw, $C, 8);
}
$sy += 2;

$sy = drawSidebarTitle($pdf, $sidebarPad, $sy, 'Core Skills', $sw, $C);
$coreSkills = array_slice($skillGroups['Frontend'], 0, 4);
$coreSkills = array_merge($coreSkills, array_slice($skillGroups['Backend & Data'], 0, 3));
$sy = drawSidebarText($pdf, $sidebarPad, $sy, implode("\n", array_map(fn($s) => '· ' . $s, $coreSkills)), $sw, $C, 7.8);
$sy += 2;

$sy = drawSidebarTitle($pdf, $sidebarPad, $sy, 'Strengths', $sw, $C);
drawSidebarText($pdf, $sidebarPad, $sy, implode("\n", array_map(fn($q) => '· ' . $q, array_slice($qualities, 0, 6))), $sw, $C, 7.8);

// --- Main column header ---
$my = 16;
setText($pdf, $C['ink']);
$pdf->SetFont('Helvetica', 'B', 22);
$pdf->SetXY($mainX, $my);
$pdf->Cell($mainW, 9, $name, 0, 1);

$pdf->SetX($mainX);
setText($pdf, $C['accent']);
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->Cell($mainW, 6, $title, 0, 1);

$pdf->SetX($mainX);
setText($pdf, $C['body']);
$pdf->SetFont('Helvetica', '', 9);
$pdf->Cell($mainW, 5, $tagline, 0, 1);

setDraw($pdf, $C['accent'], 0.8);
$pdf->Line($mainX, $my + 24, $mainX + $mainW, $my + 24);

$my = 46;
$my = drawMainSection($pdf, $mainX, $my, 'Professional Summary', $mainW, $C);
$my = drawBodyText($pdf, $mainX, $my, $about, $mainW, $C) + 4;

$my = drawMainSection($pdf, $mainX, $my, 'Experience', $mainW, $C);
foreach ($experience as $job) {
    $my = drawExperienceBlock($pdf, $mainX, $my, $job, $mainW, $C);
}

$my = drawMainSection($pdf, $mainX, $my, 'Featured Projects', $mainW, $C);
foreach (array_slice($projects, 0, 3) as $project) {
    $pdf->SetXY($mainX, $my);
    if ($my > 248) {
        break;
    }
    $my = drawProjectBlock($pdf, $mainX, $my, $project, $mainW, $C);
}

drawPageFooter($pdf, $name, 1, $C, $sidebarW);

// ============================================
// PAGE 2 — Full portfolio & credentials
// ============================================

$pdf->AddPage();

setFill($pdf, $C['navy']);
$pdf->Rect(0, 0, $pageW, 28, 'F');
setFill($pdf, $C['accent']);
$pdf->Rect(0, 0, $pageW, 2.5, 'F');

$pdf->SetXY(14, 8);
setText($pdf, $C['white']);
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(120, 7, $name, 0, 1);

$pdf->SetX(14);
setText($pdf, [203, 213, 225]);
$pdf->SetFont('Helvetica', '', 9);
$pdf->Cell(120, 5, 'Portfolio Highlights · Projects · Certifications · Technical Skills', 0, 0);

$pdf->SetXY(130, 9);
setText($pdf, $C['white']);
$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(66, 4, $email, 0, 2, 'R');
$pdf->SetX(130);
$pdf->Cell(66, 4, $phone, 0, 0, 'R');

$p2x = 14;
$p2w = 182;
$p2y = 36;

$p2y = drawMainSection($pdf, $p2x, $p2y, 'Project Portfolio', $p2w, $C);
foreach ($projects as $project) {
    if ($p2y > 248) {
        break;
    }
    $p2y = drawProjectBlock($pdf, $p2x, $p2y, $project, $p2w, $C);
}

// Two-column lower section
$colW = 88;
$leftColX = $p2x;
$rightColX = $p2x + $colW + 6;
$lowerY = max($p2y + 4, 168);

if ($lowerY > 230) {
    $lowerY = 168;
}

$certY = drawMainSection($pdf, $leftColX, $lowerY, 'Certifications', $colW, $C);
foreach ($certifications as $cert) {
    $certY = drawCertRow($pdf, $leftColX, $certY, $cert, $colW, $C);
}

$skillY = drawMainSection($pdf, $rightColX, $lowerY, 'Technical Skills', $colW, $C);
foreach ($skillGroups as $label => $items) {
    $skillY = drawSkillGroup($pdf, $rightColX, $skillY, $label, $items, $colW, $C);
}

$skillY = drawSkillGroup($pdf, $rightColX, $skillY + 2, 'Currently Learning', $learning, $colW, $C);

// Strengths bar at bottom
$barY = 268;
setFill($pdf, $C['paper']);
setDraw($pdf, $C['line'], 0.2);
$pdf->Rect($p2x, $barY, $p2w, 16, 'DF');

$pdf->SetXY($p2x + 4, $barY + 3);
setText($pdf, $C['ink']);
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(28, 4, 'STRENGTHS', 0, 0);

$pdf->SetXY($p2x + 34, $barY + 3);
setText($pdf, $C['body']);
$pdf->SetFont('Helvetica', '', 8);
$pdf->MultiCell($p2w - 38, 4, implode('  ·  ', $qualities), 0, 'L');

setDraw($pdf, $C['line'], 0.15);
$pdf->Line(14, 285, 196, 285);
setText($pdf, $C['muted']);
$pdf->SetFont('Helvetica', '', 7.5);
$pdf->SetXY(14, 286);
$pdf->Cell(90, 4, $name . '  ·  Resume', 0, 0, 'L');
$pdf->Cell(182, 4, 'Page 2', 0, 0, 'R');

// ============================================
// OUTPUT
// ============================================

$download = isset($_GET['download']);
$filename = 'john-kenneth-araojo-resume.pdf';

if (php_sapi_name() === 'cli') {
    $publicPath = __DIR__ . '/../public/resume.pdf';
    $pdf->Output('F', $publicPath);
    echo "Resume saved to {$publicPath}\n";
} else {
    $pdf->Output($download ? 'D' : 'I', $filename);
}
