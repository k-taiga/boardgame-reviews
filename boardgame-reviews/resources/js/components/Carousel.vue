<template>
  <el-carousel :interval="5000" arrow="hover">
    <el-carousel-item>
      <div>
        <h3>Boardgame Reviews</h3>
        <p>ようこそ！！！！！！</p>
        <img />
      </div>
    </el-carousel-item>
  </el-carousel>
</template>

<script>
export default {
  name: "Carousel"
};
</script>

<style>
.el-carousel__item h3 {
  color: #475669;
  font-size: 18px;
  opacity: 0.75;
  line-height: 300px;
  margin: 0;
  height: 250px;
  text-align: center;
}

.el-carousel__item:nth-child(2n) {
  background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n + 1) {
  background-color: #d3dce6;
}
</style>
