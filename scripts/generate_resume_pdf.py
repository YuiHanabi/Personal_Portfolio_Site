from fpdf import FPDF, XPos, YPos
from pathlib import Path

OUTPUT = Path(__file__).resolve().parent.parent / 'public' / 'resume.pdf'
PHOTO = Path(__file__).resolve().parent.parent / 'src' / 'assets' / 'hero-image.png'

pdf = FPDF('P', 'mm', 'A4')
pdf.set_auto_page_break(auto=True, margin=12)
pdf.add_page()
pdf.set_margins(0, 0, 0)

# Layout constants
sidebar_w = 70
sidebar_x = 8
sidebar_text_w = sidebar_w - (sidebar_x * 2)
content_x = sidebar_w + 10
content_w = 210 - content_x - 10

# Colors
primary = (34, 49, 63)
accent = (65, 84, 117)

# Left sidebar background
pdf.set_fill_color(*primary)
pdf.rect(0, 0, sidebar_w, 297, 'F')


def sidebar_section(y, title, body, body_font_size=9.2):
    pdf.set_text_color(255, 255, 255)
    pdf.set_xy(sidebar_x, y)
    pdf.set_font('Helvetica', 'B', 12)
    pdf.cell(sidebar_text_w, 6, title, new_x=XPos.LEFT, new_y=YPos.NEXT, align='C')
    pdf.ln(1.5)
    pdf.set_x(sidebar_x)
    pdf.set_font('Helvetica', '', body_font_size)
    pdf.multi_cell(sidebar_text_w, 4.8, body, align='L')

    return pdf.get_y()

# Optional photo
if PHOTO.exists():
    photo_x = 15
    photo_y = 18
    photo_size = 40
    pdf.set_fill_color(255, 255, 255)
    pdf.rect(photo_x - 1.5, photo_y - 1.5, photo_size + 3, photo_size + 3, 'F')
    pdf.set_draw_color(255, 255, 255)
    pdf.set_line_width(1)
    pdf.rect(photo_x - 1.5, photo_y - 1.5, photo_size + 3, photo_size + 3)
    pdf.image(str(PHOTO), x=photo_x, y=photo_y, w=photo_size, h=photo_size)

# Sidebar text
sidebar_section(70, 'CONTACT', '09603916925\njohnkennetho.araojo@gmail.com\nMetro Manila, Philippines')
sidebar_section(118, 'EDUCATION', 'Adamson University\nBachelor of Science in Computer Science\n2021 - 2026')

pdf.set_text_color(255, 255, 255)
pdf.set_xy(sidebar_x, 172)
pdf.set_font('Helvetica', 'B', 12)
pdf.cell(sidebar_text_w, 6, 'SKILLS', new_x=XPos.LEFT, new_y=YPos.NEXT, align='C')
pdf.ln(1.5)
pdf.set_font('Helvetica', '', 9.2)
skills = ['HTML / CSS', 'JavaScript', 'React', 'PHP', 'MySQL', 'Git']
for skill in skills:
    pdf.set_x(sidebar_x)
    pdf.multi_cell(sidebar_text_w, 4.8, f'- {skill}', align='L')

# Main content
pdf.set_text_color(*primary)
pdf.set_xy(content_x, 18)
pdf.set_font('Helvetica', 'B', 24)
pdf.cell(content_w, 10, 'Araojo', new_x=XPos.LMARGIN, new_y=YPos.NEXT)
pdf.set_x(content_x)
pdf.set_font('Helvetica', 'B', 14)
pdf.cell(content_w, 7, 'John Kenneth', new_x=XPos.LMARGIN, new_y=YPos.NEXT)
pdf.ln(2)
pdf.set_x(content_x)
pdf.set_font('Helvetica', '', 11)
pdf.multi_cell(content_w, 6, 'Computer Science Major | IT & Web Development Intern')

pdf.set_draw_color(*accent)
pdf.set_line_width(0.7)
pdf.line(content_x, 58, content_x + content_w, 58)

pdf.set_xy(content_x, 68)
pdf.set_font('Helvetica', 'B', 12)
pdf.cell(content_w, 6, 'ABOUT ME', new_x=XPos.LMARGIN, new_y=YPos.NEXT)
pdf.set_x(content_x)
pdf.set_font('Helvetica', '', 10)
pdf.ln(1)
pdf.set_x(content_x)
pdf.multi_cell(content_w, 6, 'Computer science student with a strong foundation in programming, problem-solving, and software development. Experienced in building small-scale applications, debugging code, and working with data structures and algorithms.')

pdf.set_xy(content_x, 100)
pdf.set_font('Helvetica', 'B', 12)
pdf.cell(content_w, 6, 'ACADEMIC PROJECTS', new_x=XPos.LMARGIN, new_y=YPos.NEXT)
pdf.set_font('Helvetica', '', 10)
pdf.ln(2)
projects = [
    ('Sentiment Analysis (Academic Project)', 'Developed a sentiment analysis system as part of coursework; built an AI and machine learning concept to analyze text and evaluate sentiment.'),
    ('Web Development System (Academic Project)', 'Designed and developed a web-based system using HTML, CSS, JavaScript, and PHP; connected to a database using MySQL / SQLite.'),
    ('Unity Game Development (Academic Project)', 'Created a simple game using Unity and C# as part of class requirements; implemented game logic, player movement, and UI elements.'),
    ('Mobile Application Development (Academic Project)', 'Developed a mobile application as part of coursework; implemented core application features and user interface design.')
]
for title, desc in projects:
    pdf.set_x(content_x)
    pdf.set_font('Helvetica', 'B', 10)
    pdf.multi_cell(content_w, 5, title)
    pdf.set_x(content_x)
    pdf.set_font('Helvetica', '', 10)
    pdf.multi_cell(content_w, 5, desc)
    pdf.ln(2)

pdf.set_xy(content_x, 190)
pdf.set_font('Helvetica', 'B', 12)
pdf.cell(content_w, 6, 'PERSONAL QUALITIES', new_x=XPos.LMARGIN, new_y=YPos.NEXT)
pdf.set_x(content_x)
pdf.set_font('Helvetica', '', 10)
pdf.ln(1)
pdf.set_x(content_x)
pdf.multi_cell(content_w, 5, 'Willing to learn and adaptable.\nGood problem-solving skills.\nPassionate about technology and development.')

OUTPUT.parent.mkdir(parents=True, exist_ok=True)
pdf.output(str(OUTPUT))
print(f'Generated {OUTPUT}')
