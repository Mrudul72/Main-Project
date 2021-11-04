$(".ring-chart").circleChart();

$(".ring-chart").circleChart({
    color: "#3459eb",
    backgroundColor: "#e6e6e6",
    background: true,
    speed: 2000,
    widthRatio: 0.2,
    value: 66,
    unit: 'percent',
    counterclockwise: false,
    size: 110,
    startAngle: 0,
    animate: true,
    backgroundFix: true,
    lineCap: "round", // butt, round, square
    animation: "easeInOutCubic", // linearTween, easeInQuad, easeOutQuad, easeInOutQuad, easeInCubic, easeOutCubic, easeInOutCubic, easeInQuart, easeOutQuart, easeInOutQuart, easeInQuint, easeOutQuint, easeInOutQuint, easeInSine, easeOutSine, easeInOutSine, easeInExpo, easeOutExpo, easeInOutExpo, easeInCirc, easeOutCirc, easeInOutCirc
    text: 0 + '%',
    redraw: false,
    cAngle: 0.1,
    textCenter: false,
    textSize: false,
    relativeTextSize: 1 / 7,
    autoCss: true,
    onDraw: function(){}
  });