const timeline = [
  {
    year: '2022',
    tag: 'CS',
    title: 'Started Computer Science',
    description:
      'Began studying Computer Science and programming fundamentals. Learned C#, Java, and Python programming languages.',
  },
  {
    year: '2023',
    tag: 'WEB',
    title: 'Frontend and Backend Development',
    description:
      'Learned HTML, CSS, and JavaScript, started building web applications, explored Node.js and Express, learned SQL, built RESTful APIs, and practiced algorithm analysis.',
  },
  {
    year: '2024',
    tag: 'APP',
    title: 'React & Laravel',
    description:
      'Started building modern web applications with stronger frontend structure and backend workflows.',
  },
  {
    year: '2025',
    tag: 'AI',
    title: 'AI Research',
    description:
      'Built a sentiment analysis model using GoEmotions and explored how machine learning can support real-world projects.',
  },
  {
    year: '2026',
    tag: 'IT',
    title: 'Internship',
    description:
      'Worked as a Developer and IT Support, applying technical skills in a professional environment.',
  },
  {
    year: 'Present',
    tag: 'NOW',
    title: 'Portfolio',
    description:
      'Building full-stack projects using React and Firebase while continuing to improve as a developer.',
  },
];

function Timeline() {
  return (
    <section className="learning-timeline-section" id="timeline">
      <div className="learning-timeline-header">
        <div className="section-heading">
          <span className="arrow-doodle">-&gt;</span>
          <h2>Learning Timeline</h2>
        </div>
        <p className="learning-timeline-subtitle">
          A quick path through the skills, projects, and experience that shaped
          my developer journey so far.
        </p>
      </div>

      <div className="learning-timeline-board" aria-label="Developer learning timeline">
        {timeline.map((item, index) => (
          <article className="learning-timeline-item" key={item.year}>
            <div className="learning-timeline-marker" aria-hidden="true">
              <span>{item.tag}</span>
            </div>
            <div className="learning-timeline-card">
              <div className="learning-timeline-card-top">
                <span className="learning-timeline-year">{item.year}</span>
                <span className="learning-timeline-index">0{index + 1}</span>
              </div>
              <h3>{item.title}</h3>
              <p>{item.description}</p>
            </div>
          </article>
        ))}
      </div>

      <div className="learning-timeline-note" aria-hidden="true">
        still building
      </div>
    </section>
  );
}

export default Timeline;
