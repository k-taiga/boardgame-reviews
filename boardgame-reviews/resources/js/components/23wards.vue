<template>
  <div class="navbar-start">
    <div class="navbar-item has-dropdown is-hoverable">
      <a class="navbar-link has-text-white">BodogeCafe by 23区</a>
      <div class="navbar-dropdown is-size-6" style="width: 18rem;">
        <ul class="states-mega">
          <li>
            <a href="https://www.receptionhalls.com/banquet-halls/AL">Alabama</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>
.ul.states-mega {
  max-height: 160px;
  z-index: 99;
  width: 60%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  justify-content: center;
}
ul.states-mega li {
  font-size: 1.1rem;
  padding-left: 1rem;
  margin: 0 1rem 0.25rem 0;
}
</style>
