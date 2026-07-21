import CertificateCard from './ui/CertificateCard.jsx';

const timeline = [
  {
    year: '2026',
    title: 'Portfolio & Projects',
    description: 'Built personal portfolio and multiple frontend projects with React.',
    color: 'y1',
  },
  {
    year: '2023',
    title: 'Web Development Focus',
    description: 'Deepened skills in HTML, CSS, JavaScript, and responsive design.',
    color: 'y2',
  },
  {
    year: '2022',
    title: 'CS Foundations',
    description: 'Started computer science coursework and programming fundamentals.',
    color: 'y3',
  },
  {
    year: '2021',
    title: 'First Code',
    description: 'Wrote my first programs and discovered a passion for building things.',
    color: 'y4',
  },
];

function Certificates({ certificates }) {
  return (
    <section className="journey-certs-section" id="certificates">
      <div className="two-col">
        <div className="experience-side">
          <div className="section-heading">
            <span className="arrow-doodle">→</span>
            <h2>Experience Journey</h2>
          </div>
          <div className="experience-timeline">
            {timeline.map((item) => (
              <div key={item.year} className="timeline-item">
                <div className={`timeline-year ${item.color}`}>{item.year}</div>
                <div className="timeline-content">
                  <h4>{item.title}</h4>
                  <p>{item.description}</p>
                </div>
              </div>
            ))}
          </div>
        </div>

        <div className="certificates-side">
          <div className="section-heading">
            <span className="arrow-doodle">→</span>
            <h2>Certificates</h2>
          </div>
          <div className="certificate-grid">
            {certificates.map((certificate, index) => (
              <CertificateCard key={certificate.title} certificate={certificate} index={index} />
            ))}
          </div>
        </div>
      </div>
    </section>
  );
}

export default Certificates;
