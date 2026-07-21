<?php
require_once __DIR__ . '/../fpdf/fpdf.php';

// ============================================
// RESUME INFORMATION
// ============================================

$name = 'John Kenneth Araojo';
$title = 'Computer Science Student';
$subtitle = 'Web Development Intern';

$email = 'johnkennetho.araojo@gmail.com';
$phone = '09603916925';
$location = 'Metro Manila, Philippines';

$about =
"Computer Science student with experience in developing web applications, databases, and software systems. Strong foundation in programming, debugging, and problem-solving. Passionate about learning new technologies and creating efficient solutions.";

$education = [
    [
        'school' => 'Adamson University',
        'degree' => 'Bachelor of Science in Computer Science',
        'dates' => '2021 - 2026'
    ]
];

$projects = [
    [
        'title' => 'Sentiment Analysis System',
        'desc' => 'Developed an AI-based sentiment analysis system using TensorFlow, Keras, and the GoEmotions dataset.'
    ],
    [
        'title' => 'Help Desk Management System',
        'desc' => 'Created a web-based IT help desk system using PHP, MySQL, JavaScript, and Bootstrap.'
    ],
    [
        'title' => 'Unity 2D Game',
        'desc' => 'Designed and programmed a simple 2D game in Unity using C#.'
    ]
];

$skills = [
    'HTML',
    'CSS',
    'JavaScript',
    'React',
    'PHP',
    'Laravel',
    'MySQL',
    'Git',
    'Python',
    'Java',
    'C#'
];

$qualities = [
    'Fast Learner',
    'Problem Solver',
    'Team Player',
    'Adaptable',
    'Attention to Detail'
];

$photoPath = __DIR__ . '/../src/assets/hero-image.png';

// ============================================
// CREATE PDF
// ============================================

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(true, 16);
$pdf->AddPage();

// Colors
$sidebarColor = [24, 24, 24];
$accentColor  = [37, 99, 235];
$textColor    = [40, 40, 40];
$grayColor    = [95, 95, 95];
$lightGray    = [225, 225, 225];

$leftW = 70;
$leftX = 8;
$rightX = $leftW + 10;
$contentWidth = 195 - $rightX;

function addSidebarSection($pdf, $x, $y, $title, $body, $width)
{
    $pdf->SetXY($x, $y);
    $pdf->SetFont('Helvetica', 'B', 11);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell($width, 5, $title, 0, 1, 'C');

    $y += 7;
    $pdf->SetFont('Helvetica', '', 8.7);
    $pdf->SetXY($x, $y);
    $pdf->MultiCell($width, 4.4, $body, 0, 'L');

    return $pdf->GetY() + 3;
}

function addRightSectionTitle($pdf, $x, $y, $title, $width, $accentColor, $lineColor)
{
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($accentColor[0], $accentColor[1], $accentColor[2]);
    $pdf->SetFont('Helvetica', 'B', 12);
    $pdf->Cell($width, 6, strtoupper($title), 0, 1);

    $y = $pdf->GetY() + 1;
    $pdf->SetDrawColor($lineColor[0], $lineColor[1], $lineColor[2]);
    $pdf->Line($x, $y, $x + $width, $y);

    return $y + 4;
}

function addRightText($pdf, $x, $y, $text, $width, $textColor)
{
    $pdf->SetXY($x, $y);
    $pdf->SetFont('Helvetica', '', 9.2);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->MultiCell($width, 4.8, $text, 0, 'L');

    return $pdf->GetY() + 2;
}

// Draw sidebar
$pdf->SetFillColor($sidebarColor[0], $sidebarColor[1], $sidebarColor[2]);
$pdf->Rect(0, 0, $leftW, 297, 'F');

// Profile photo
if (file_exists($photoPath)) {
    $photoSize = 32;
    $photoX = ($leftW - $photoSize) / 2;
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Rect($photoX - 1.5, 13.5, $photoSize + 3, $photoSize + 3, 'F');
    $pdf->SetDrawColor(255, 255, 255);
    $pdf->SetLineWidth(0.9);
    $pdf->Rect($photoX - 1.5, 13.5, $photoSize + 3, $photoSize + 3);
    $pdf->Image($photoPath, $photoX, 15, $photoSize, $photoSize);
}

// Name block in sidebar
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->SetXY(6, 52);
$pdf->Cell($leftW - 12, 5, 'John Kenneth', 0, 1, 'C');
$pdf->SetX(6);
$pdf->Cell($leftW - 12, 5, 'Araojo', 0, 1, 'C');

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetLineWidth(0.35);
$pdf->Line(10, 68, $leftW - 10, 68);

// Right header
$pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
$pdf->SetXY($rightX, 16);
$pdf->SetFont('Helvetica', 'B', 22);
$pdf->Cell($contentWidth, 8, $name);

$pdf->SetX($rightX);
$pdf->SetFont('Helvetica', '', 11);
$pdf->SetTextColor($grayColor[0], $grayColor[1], $grayColor[2]);
$pdf->Cell($contentWidth, 6, $title);
$pdf->Ln(4);
$pdf->SetX($rightX);
$pdf->Cell($contentWidth, 6, $subtitle);

$pdf->SetDrawColor($accentColor[0], $accentColor[1], $accentColor[2]);
$pdf->SetLineWidth(0.8);
$pdf->Line($rightX, 42, 195, 42);

// Sidebar content
$y = 78;
$y = addSidebarSection($pdf, $leftX, $y, 'CONTACT', "{$phone}\n{$email}\n{$location}", $leftW - 16);

$educationText = '';
foreach ($education as $edu) {
    $educationText .= $edu['school'] . "\n" . $edu['degree'] . "\n" . $edu['dates'] . "\n\n";
}
$y = addSidebarSection($pdf, $leftX, $y, 'EDUCATION', trim($educationText), $leftW - 16);

$skillsText = implode("\n", $skills);
$y = addSidebarSection($pdf, $leftX, $y, 'SKILLS', $skillsText, $leftW - 16);

$qualitiesText = implode("\n", $qualities);
$y = addSidebarSection($pdf, $leftX, $y, 'STRENGTHS', $qualitiesText, $leftW - 16);

// Main content
$currentY = 50;
$currentY = addRightSectionTitle($pdf, $rightX, $currentY, 'Profile', $contentWidth, $accentColor, $lightGray);
$currentY = addRightText($pdf, $rightX, $currentY, $about, $contentWidth, $grayColor);

$currentY += 4;
$currentY = addRightSectionTitle($pdf, $rightX, $currentY, 'Projects', $contentWidth, $accentColor, $lightGray);
foreach ($projects as $project) {
    $pdf->SetXY($rightX, $currentY);
    $pdf->SetFont('Helvetica', 'B', 10);
    $pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
    $pdf->Cell($contentWidth, 5, $project['title']);

    $currentY = $pdf->GetY() + 1;
    $currentY = addRightText($pdf, $rightX, $currentY, $project['desc'], $contentWidth, $grayColor);
    $currentY += 2;
}

$currentY = addRightSectionTitle($pdf, $rightX, $currentY, 'Experience', $contentWidth, $accentColor, $lightGray);
$pdf->SetXY($rightX, $currentY);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->SetTextColor($textColor[0], $textColor[1], $textColor[2]);
$pdf->Cell($contentWidth, 5, 'Web Development Intern');

$currentY = $pdf->GetY() + 1;
$currentY = addRightText(
    $pdf,
    $rightX,
    $currentY,
    'Developed and maintained web applications using PHP, JavaScript, MySQL, HTML, and CSS. Assisted in debugging systems, implementing new features, and collaborating with team members during software development.',
    $contentWidth,
    $grayColor
);

$currentY = addRightSectionTitle($pdf, $rightX, $currentY, 'Certifications', $contentWidth, $accentColor, $lightGray);
$currentY = addRightText(
    $pdf,
    $rightX,
    $currentY,
    "- FreeCodeCamp Responsive Web Design\n- Cisco Networking Academy\n- Google Data Analytics (Optional)",
    $contentWidth,
    $grayColor
);

// Footer
$pdf->SetY(-12);
$pdf->SetFont('Helvetica', 'I', 8);
$pdf->SetTextColor(130, 130, 130);
$pdf->Cell(0, 5, 'Generated Resume', 0, 0, 'C');

$download = isset($_GET['download']);
$pdf->Output($download ? 'D' : 'I', 'john-kenneth-araojo-resume.pdf');
?>
