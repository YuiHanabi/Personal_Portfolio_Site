import { useEffect } from 'react';

function prefersReducedMotion() {
  return window.matchMedia('(prefers-reduced-motion: reduce)').matches;
}

function isTouchDevice() {
  return window.matchMedia('(pointer: coarse)').matches;
}

export default function useParallax() {
  useEffect(() => {
    if (prefersReducedMotion()) return undefined;

    const elements = document.querySelectorAll('[data-speed]');
    if (!elements.length) return undefined;

    const applyParallax = (xOffset, yOffset) => {
      elements.forEach((element) => {
        const speed = Number(element.dataset.speed) || 0;
        element.style.setProperty('--parallax-x', `${xOffset * speed}px`);
        element.style.setProperty('--parallax-y', `${yOffset * speed}px`);
      });
    };

    const handleMove = (event) => {
      const x = event.clientX / window.innerWidth - 0.5;
      const y = event.clientY / window.innerHeight - 0.5;
      applyParallax(x, y);
    };

    const handleScroll = () => {
      const progress = window.scrollY / Math.max(document.body.scrollHeight - window.innerHeight, 1);
      const x = Math.sin(progress * Math.PI * 2) * 0.08;
      const y = progress * 0.15 - 0.075;
      applyParallax(x, y);
    };

    if (isTouchDevice()) {
      handleScroll();
      window.addEventListener('scroll', handleScroll, { passive: true });
      return () => window.removeEventListener('scroll', handleScroll);
    }

    window.addEventListener('mousemove', handleMove, { passive: true });
    return () => window.removeEventListener('mousemove', handleMove);
  }, []);
}
