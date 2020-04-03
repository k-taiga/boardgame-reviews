<template>
  <RouterLink :to="`/home`">
    <div class="float-btn">
      <div class="float-btn-icon">
        <i class="fas fa-home"></i>
      </div>
      <div class="float-btn-text">Add Shop</div>
    </div>
  </RouterLink>
</template>

<style scoped>
.float-btn {
  z-index: 1000;
  position: fixed;
  bottom: 20px;
  background: #5bafc4;
  width: 130px;
  height: 130px;
  right: 20px;
  border-radius: 100%;
  text-align: center;
  font-size: 35px;
  line-height: 130px;
  cursor: pointer;
}

.float-btn-icon {
  position: relative;
  height: 30px;
  color: #fff;
  top: -20px;
  left: -2px;
}

.float-btn-text {
  height: 10px;
  font-size: 15px;
  position: relative;
  top: -20px;
  font-weight: 700;
  color: #fff;
  left: -4px;
}
</style>
