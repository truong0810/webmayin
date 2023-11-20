const header = document.querySelector('.header');
const nav = document.querySelector('.header-nav');
const navHeight = nav.getBoundingClientRect().height;
const stickyNav = function (entries) {
  const [entry] = entries;
  console.log('stickyNav ~ entry', entry);
  if (!entry.isIntersecting) nav.classList.add('sticky');
  else nav.classList.remove('sticky');
};
const headerObserver = new IntersectionObserver(stickyNav, {
  root: null,
  threshold: 0,
  rootMargin: `-${navHeight}px`,
});
headerObserver.observe(header);

// DASHBOARD USER
const dashboardUser = document.querySelector('.dashboard-user');
const dashboardUserSetting = document.querySelector('.dashboard-user-setting');
dashboardUser?.addEventListener('click', function () {
  dashboardUserSetting.classList.toggle('hidden-sub');
});

// TABS ACTIVE
const tabs = document.querySelectorAll('.warranty__tab');
console.log('tabs', tabs);
const tabsContainer = document.querySelector('.warranty__tabs-container');
const tabsContent = document.querySelectorAll('.warranty__content');

tabsContainer.addEventListener('click', function (e) {
  const clicked = e.target.closest('.warranty__tab');
  if (!clicked) return;
  tabs.forEach((tab) => tab.classList.remove('warranty__tab--active'));
  tabsContent.forEach((c) => c.classList.remove('warranty__content--active'));
  clicked.classList.add('warranty__tab--active');
  document
    .querySelector(`.warranty__content--${clicked.dataset.tab}`)
    .classList.add('warranty__content--active');
});
