<template>
  <router-view />
</template>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.register {
  font-weight: bold;
  text-decoration: none;
  color: #000000;
  &.router-link-exact-active {
    color: #000000;
  }
  transition: 0.5s ease-in-out;
}
.register:hover {
  color: #878787;
  &.router-link-exact-active {
    color: #878787;
  }
}
</style>
