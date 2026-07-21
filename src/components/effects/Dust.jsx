import { useEffect, useMemo, useState } from 'react';
import '../../styles/dust.css';

function getParticleCount() {
  if (typeof window === 'undefined') return 28;
  if (window.matchMedia('(max-width: 480px)').matches) return 14;
  if (window.matchMedia('(max-width: 768px)').matches) return 20;
  return 28;
}

function Dust() {
  const [count, setCount] = useState(getParticleCount);

  useEffect(() => {
    const updateCount = () => setCount(getParticleCount());
    window.addEventListener('resize', updateCount, { passive: true });
    return () => window.removeEventListener('resize', updateCount);
  }, []);

  const particles = useMemo(
    () =>
      Array.from({ length: count }, (_, index) => ({
        id: index,
        left: `${Math.random() * 100}%`,
        delay: `${Math.random() * 12}s`,
        duration: `${14 + Math.random() * 18}s`,
        size: `${2 + Math.random() * 3}px`,
        opacity: 0.1 + Math.random() * 0.15,
      })),
    [count],
  );

  return (
    <div className="dust-container" aria-hidden="true">
      {particles.map((particle) => (
        <span
          key={particle.id}
          className="dust"
          style={{
            left: particle.left,
            width: particle.size,
            height: particle.size,
            opacity: particle.opacity,
            animationDelay: particle.delay,
            animationDuration: particle.duration,
          }}
        />
      ))}
    </div>
  );
}

export default Dust;
