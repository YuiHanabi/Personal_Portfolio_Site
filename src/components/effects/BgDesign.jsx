import '../../styles/bgDesign.css';

function BgDesign() {
  return (
    <div className="bg-design" aria-hidden="true">
      <div className="bg-shapes">
        <div className="blob blob-1" />
        <div className="blob blob-2" />
        <div className="blob blob-3" />
      </div>

      <span className="bg-star bg-star-1" />
      <span className="bg-star bg-star-2" />
      <span className="bg-star bg-star-3" />

      <div className="grid-pattern" />
      <svg className="waves" viewBox="0 0 400 400" focusable="false">
        <path
          d="M0 200 C80 120 160 280 240 200 S400 120 400 200"
          fill="none"
          stroke="currentColor"
          strokeWidth="2"
        />
      </svg>

      <span className="bg-spark bg-spark-1" />
      <span className="bg-spark bg-spark-2" />
      <div className="bg-circle bg-circle-1" />
      <div className="bg-circle bg-circle-2" />
      <div className="dot-field" />
    </div>
  );
}

export default BgDesign;
