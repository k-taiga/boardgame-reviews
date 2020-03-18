<template>
  <div class="navbar-start">
    <div class="navbar-item has-dropdown is-hoverable">
      <a class="navbar-link has-text-white">BodogeCafe by 23区</a>
      <div class="navbar-dropdown is-size-6" style="width: 50rem;">
        <ul class="wards">
          <li>
            <a href="/">足立区</a>
          </li>
          <li>
            <a href="/">荒川区</a>
          </li>
          <li>
            <a href="/">板橋区</a>
          </li>
          <li>
            <a href="/">江戸川区</a>
          </li>
          <li>
            <a href="/">大田区</a>
          </li>
          <li>
            <a href="/">葛飾区</a>
          </li>
          <li>
            <a href="/">北 区</a>
          </li>
          <li>
            <a href="/">江東区</a>
          </li>
          <li>
            <a href="/">品川区</a>
          </li>
          <li>
            <a href="/">渋谷区</a>
          </li>
          <li>
            <a href="/">新宿区</a>
          </li>
          <li>
            <a href="/">杉並区</a>
          </li>
          <li>
            <a href="/">墨田区</a>
          </li>
          <li>
            <a href="/">世田谷区</a>
          </li>
          <li>
            <a href="/">台東区</a>
          </li>
          <li>
            <a href="/">千代田区</a>
          </li>
          <li>
            <a href="/">中央区</a>
          </li>
          <li>
            <a href="/">豊島区</a>
          </li>
          <li>
            <a href="/">中野区</a>
          </li>
          <li>
            <a href="/">練馬区</a>
          </li>
          <li>
            <a href="/">文京区</a>
          </li>
          <li>
            <a href="/">港 区</a>
          </li>
          <li>
            <a href="/">目黒区</a>
          </li>
          <li>
            <a href="/">23区外</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped>
a {
  color: #a6d4cc;
}
.navbar-dropdown {
  background-color: #fff;
  border-bottom-left-radius: 6px;
  border-bottom-right-radius: 6px;
  border-top: 2px solid #dbdbdb;
  -webkit-box-shadow: 0 8px 8px hsla(0, 0%, 4%, 0.1);
  box-shadow: 0 8px 8px hsla(0, 0%, 4%, 0.1);
  display: none;
  font-size: 0.875rem;
  left: 0;
  min-width: 100%;
  position: absolute;
  top: 100%;
  z-index: 20;
}
ul.wards {
  max-height: 150px;
  z-index: 99;
  width: 100%;
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
ul.wards li {
  font-size: 1.1rem;
  padding-left: 1rem;
  margin: 0 1rem 0.25rem 0;
}
</style>
