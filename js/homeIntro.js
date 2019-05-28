function HomeIntro() {
  let tl = new TimelineMax();

  const backgroundImage = name => {
    return document
      .querySelector(`${name}`)
      .querySelector('.background-image-holder');
  };

  const customEase = () =>
    CustomEase.create('custom', 'M0,0 C0.25,0.1 0.25,1 1,1');

  const arrayOfChildren = element => Array.from(element.children);

  const firstSection = () =>
    arrayOfChildren(document.querySelector('.remainder'))[0];

  const textNodes = arrayOfChildren(firstSection());

  const setup = () => {
    tl.add(TweenLite.set('.page-header', { overflow: 'hidden' }));
    tl.add(TweenLite.set('.header-top', { opacity: 0 }));
    tl.add(TweenLite.set('.header-bottom', { opacity: 0 }));
    tl.add(TweenLite.set('.page-title', { opacity: 0 }));
    tl.add(
      TweenLite.set('.heading__split', {
        opacity: 0,
        transform: 'translateY(-10px)',
      }),
    );
    tl.add(TweenLite.set('.heading__split--title', { opacity: 0 }));
    tl.add(TweenLite.set('.layer--2', { transform: 'translateY(55px)' }));
    tl.add(TweenLite.set('.layer--3', { transform: 'translateY(55px)' }));

    tl.add(
      TweenLite.set(backgroundImage('.page-header'), {
        transform: 'scale(1.05)',
      }),
    );
  };

  const backgroundZoom = () => {
    tl.add(
      TweenLite.to('.overlayLayer', 0.6, { opacity: 0, ease: customEase() }),
    );
    tl.add(
      TweenLite.to(backgroundImage('.page-header'), 1.8, {
        transform: 'scale(1)',
        ease: customEase(),
      }),
      '-=0.6',
    );
    tl.add(
      TweenLite.to('.layer--2', 1, { transform: 'translateY(-40)' }),
      '-=1.8',
    );
    tl.add(
      TweenLite.to('.layer--3', 1, { transform: 'translateY(-80)' }),
      '-=1.8',
    );
    tl.set('.page-header', { overflow: 'visible' });
    tl.add(TweenLite.to('.header-top', 0.6, { opacity: 0.99 }), '-=1.8');
    tl.add(TweenLite.to('.header-bottom', 0.6, { opacity: 0.99 }), '-=0.6');
    tl.add(TweenLite.to('.page-title', 0.6, { opacity: 0.99 }), '-=0.6');

    tl.add(
      TweenLite.to('.heading__split', 0.4, {
        opacity: 0.99,
        transform: 'translateY(0px)',
      }),
    );
    tl.add(
      TweenLite.to('.heading__split--title', 0.4, { opacity: 0.99 }),
      '-=0.4',
    );
  };

  function runAnimation() {
    setup();
    backgroundZoom();
  }

  runAnimation();
}

window.onload = function() {
  HomeIntro();
};
