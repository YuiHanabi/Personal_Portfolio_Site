function CertificateCard({ certificate, index }) {
  return (
    <article className="certificate-card">
      <div className="certificate-card-top">
        <span className="certificate-pill">Certificate</span>
        <span className="certificate-number">{String(index + 1).padStart(2, '0')}</span>
      </div>
      <div className="certificate-ribbon" aria-hidden="true" />
      <div className="certificate-content">
        <h3>{certificate.title}</h3>
        <p>{certificate.issuer}</p>
      </div>
      <a className="certificate-button" href={certificate.link} target="_blank" rel="noreferrer">
        View -&gt;
      </a>
    </article>
  );
}

export default CertificateCard;
