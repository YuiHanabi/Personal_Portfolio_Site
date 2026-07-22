"""Create a circular resume photo with white background and accent border."""
from __future__ import annotations

import sys
from pathlib import Path

from PIL import Image, ImageDraw

ACCENT = (79, 70, 229)


def create_circular_photo(
    source: Path,
    output: Path,
    inner_size: int = 400,
    ring: int = 10,
    border_width: int = 2,
) -> None:
    img = Image.open(source).convert('RGBA')

    width, height = img.size
    side = min(width, height)
    left = (width - side) // 2
    top = (height - side) // 2
    img = img.crop((left, top, left + side, top + side))
    img = img.resize((inner_size, inner_size), Image.Resampling.LANCZOS)

    mask = Image.new('L', (inner_size, inner_size), 0)
    ImageDraw.Draw(mask).ellipse((0, 0, inner_size - 1, inner_size - 1), fill=255)
    img.putalpha(mask)

    total = inner_size + (ring * 2)
    canvas = Image.new('RGBA', (total, total), (0, 0, 0, 0))
    draw = ImageDraw.Draw(canvas)
    draw.ellipse((0, 0, total - 1, total - 1), fill=(255, 255, 255, 255))
    draw.ellipse(
        (border_width, border_width, total - border_width - 1, total - border_width - 1),
        outline=ACCENT + (255,),
        width=border_width,
    )
    canvas.paste(img, (ring, ring), img)

    output.parent.mkdir(parents=True, exist_ok=True)
    canvas.save(output, 'PNG')


def main() -> int:
    if len(sys.argv) < 3:
        print('Usage: prepare_circular_photo.py <source> <output> [inner_size]', file=sys.stderr)
        return 1

    source = Path(sys.argv[1])
    output = Path(sys.argv[2])
    inner_size = int(sys.argv[3]) if len(sys.argv) > 3 else 400

    if not source.exists():
        print(f'Source image not found: {source}', file=sys.stderr)
        return 1

    create_circular_photo(source, output, inner_size=inner_size)
    print(f'Created {output}')
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
