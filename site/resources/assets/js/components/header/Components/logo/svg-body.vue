<template>
  <g v-bind:transform="getPosition">
    <image width="198" height="80" transform="translate(1.41 2.69)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMYAAABQCAYAAABCpAoDAAAACXBIWXMAAAsSAAALEgHS3X78AAADwElEQVR4Xu3cQXLbMBBEUV8lOVRy/5MoxSRS0S6Kf4YCyBn5L97CiYgh0Gh7ZX/cbrePh98/b7dfP+LWz0pv5PM/ZIsRFXgR6TSBu7n/0FloI+pr+Wa7h55/1cG7l19olmc/rWjjOhdd9LPQfYp6ss/tjdNiM7wyl8L87uiSdUR3ImJZ58mZbR8iLTjDVXPvs9UH5Rm1881k+z9owRlGbjiLglAtlGeUxQjMVh+UZ5TFCMxWH5RnVLoYI4dnXDX3Pls9UJZRFiOAwlAdlGWUxQigMFQHZRllMQIoDNVBWUali7GgRWcYueksCkN1UJZRh4ox8gWirpi5nq0eKMuoQ8WgRWcZufEMCkN1UJZRrYpxFQpDdVCWGRYDUBiqgXLMWNZLFYMWnGn05jMoFNVAOUYta1mMAApENVCOUctaFiOAAlENlGOGxQigQFQHZRmxrNOiGKM2fBSFoTooyyiLEUBhqA7KMsNiwGz1QXlmWAyYrT4ozwyLAbPVB+WZESoGLTLT6A1nUBCqhfKMWtayGDBbfVCeGeWLcSUKQvVQphmlizF6sxkUguqhTDMsxs5s9UKZZuwWgx5+ZxSC6qFMM0oXY/RmMygE1UOZZliMndnqhTLNsBg7s9ULZZpVshgzNppBIageyjTraTFmDIu6cvZ9vvqhXDM2i0EP3S8PfeaomWtHUACqiXLNOFyMmUZvMosCUE2Ua8alxThrk1kUgOqhTLMuLcYzMzaaQSGoJso1w2I8ma9+KNeMZb1PxaAHzjB6k1kUgGqiXLMsxsZ89UO5ZizrWYyN+eqHcs2yGBvz1Q/lmmUxNuarJ8o2o1QxRm/uCDp81UXZZjyKQR88w+jNZdHBqzbKN8NifJmvvijfqGUti/FlvvqifLMsxmq++qJ8syzGar76onyzLMZqvvqifLPKFONqdPCqjfLNKlOMGZvLoINXbZRvlsVYzVdflG+WxVjNV1+Ub1aJYszYWBYdvGqjfLP+FmPGwt3Qwas+yjgDizF64FUzCB266qOMk177ifHKsyPXeBUduuqjjJNeKwaZufZIdOiqjfIlG2vOLQbJzKbD0fc14e5cW4yDLy3NZjGkDf9+tXX5gi7wTIEXlc50fTECLymd6vHHEJYv6ALPRi8rncViSBsexbi6HPSi0pkshrTBYkgbLIb0xePvSt2LcUeXeBZ6YekMT4vxDF3sV9ELvxM664poT+/i/375QPbQZc+il66Izui7oHPqYLUf3vBRVIIqpaB9aBzKYjZ6vxX8gHQ5uvAHL/+eP/bCmQAYuBjIAAAAAElFTkSuQmCC"/>
    <path class="a" d="M1.94,64.93c16.47-2.24,33.47-.24,49.54,2.84,3.29.42,6.6.75,9.93.92,7,0,13,0,20.35-1.5h66.81c16.84,2.5,32.84-1.5,49.91,0"/>
    <path class="a" d="M5,35.77c15.4,2.92,31.4-1.08,46.81.14q4-.09,8-.26t8-.45h76.07c16.55-3.5,34.55,2.5,51.24,0"/>
    <path class="b" d="M147.91,5.19V16.52c0,3.4,0,7.36,0,11.61,3.5,16.56.5,33.56-1.42,50.34"/>
    <path class="b" d="M177,4.69c6.37,19.48,4.37,39,.83,58-.36,2.65-.64,5.3-.81,7.93Q176.78,75.79,177,81"/>
    <path class="b" d="M51.91,6.19V17.36c0,3.35,0,7.26,0,11.47.48,16.86.48,34.86.55,51.49"/>
    <path class="b" d="M83.91,7.69V18.63c-.42,3.34-.68,6.66-.83,10,1.33,17.1-.67,33.1.85,49.82"/>
    <path class="b" d="M115.91,7.69V18.63c0,3.28,0,7.11,0,11.2.5,15.86.5,30.86.06,47"/>
    <path class="a" d="M7.38,19.26c16,1.43,33-2.57,48.53-.07h87.75c15.75-1.5,32.75.5,49-.92"/>
    <path class="a" d="M2,51.79a50.2,50.2,0,0,0,8.75.11c2.8-.18,4.86-.33,5.3-.38,7.9-.8,32,.64,44.38,1.16,0,0,26.39,1.1,43.11-.22l8.64-.66c2.89-.22,5.81-.43,8.74-.61h20.94c18.58-2.5,36.58,3.5,55.79,0"/>
    <path class="b" d="M67.91,6.69v11.1c.19,2.59.29,5.18.33,7.77s0,5.17,0,7.75c-.78,16-3.78,30.7-.95,46.23"/>
    <path class="b" d="M35.91,5.19v23c-.5,17.55-.5,34.55-.41,52.41"/>
    <path class="b" d="M99.91,7.69V18.63c0,3.28,0,7.11,0,11.21,1.5,15.86-.5,31.86.06,47.48"/>
    <path class="b" d="M163.91,4.19V15.67c0,3.45,0,7.47,0,11.78.08,2.87.1,5.77.06,8.68-1.56,14.55-.56,29.55-2.44,44.13"/>
    <path class="b" d="M131.91,6.19V17.36c0,3.35,0,7.26,0,11.45-.49,15.88-.49,31.88-1,48.13"/>
    <path class="a" d="M115.91,67.19h29"/>
    <path class="b" d="M19.91,2.19V26.08c-2.5,17.61,1.5,34.61-1.13,53.09"/>
    <path class="a" d="M9.95,52c4-.39,7-.61,8.47-.68s2.5-.09,2.5-.09h4c.91,0,2.24,0,4,0"/>
    <path class="c" d="M174.8,80.11a120.9,120.9,0,0,1-16.35-1.19c-2.75-.31-5.49-.65-8.23-1l-1.51-.19a205.66,205.66,0,0,0-25.27-2c-1.44,0-2.87,0-4.24.09-3.44.05-6.87.13-10.18.23-10.9.34-20.9.94-30.58,1.85-3.5.24-7,.48-10.56.71-8.3.53-17.16,1.05-26.11,1.05h0c-14.13,0-25.77-1.32-36.56-4.16C2.11,65.3,1.66,55.87,3.9,47.43l0-.1c.5-3.21,1.12-6.48,1.72-9.64a146.22,146.22,0,0,0,2.8-19.44A43,43,0,0,0,6.14,2.57c1.13,0,2.28-.07,3.43-.07,8.95,0,17.39,1.44,26.33,3,4.64.79,9.43,1.61,14.39,2.23h.12c5.89,0,11,0,17.24.2,7.18.18,14.42.27,22.14.27,11.3,0,23.52-.2,37.38-.6,2.85-.08,5.7-.18,8.56-.3,3.11-.4,6.31-.69,9.89-.88h.11a66,66,0,0,1,11.2-.83c3.28,0,6.64.16,9.88.31s6.64.31,10,.31A62.52,62.52,0,0,0,191.71,4.6a30.72,30.72,0,0,0-.43,9.19c.07,1.28.14,2.61.14,3.91v.11c.7,6.32,1.78,12.43,2.82,18.34,2,11.18,3.83,21.74,3.2,33A55.14,55.14,0,0,1,196,77.73,94.5,94.5,0,0,1,174.8,80.11Z"/>
    <path class="a" d="M55.67,68.23c6.74.46,14.74,1.46,21.7-.55"/>
    <ellipse class="d" cx="99.41" cy="43.19" rx="73" ry="27.5"/>
    <path class="e" d="M2.13,9.63"/>
    <text class="f" transform="translate(52.41 38.19)">
      <tspan class="g">T-Shirts</tspan>
      <tspan class="k" x="18" y="20 ">for people</tspan>
    </text>
    <path class="a" d="M14.54,19.59A104.66,104.66,0,0,0,27,19.16"/>
    <path class="a" d="M24.07,64.25c7.35.44,14.35,1.44,21.17,2.42"/>
    <path class="a" d="M152.54,67.66c6.87,0,12.87,0,19.61,0"/>
  </g>
</template>

<script>

export default {
  name: 'svg-body',
  props: {
    independent: {
      default: true,
      type: Boolean,
    },
    x: {
      default: 0,
      type: Number,
    },
    y: {
      default: 0,
      type: Number,
    }
  },
  computed: {
    getPosition() {
      return 'translate(' + this.x + ' ' + this.y + ')';
    }
  }
}
</script>

<style lang="scss" scoped>
  .a, .b, .c, .e {
    fill: none;
  }

  .a {
    stroke: #a33614;
  }

  .a, .b, .c, .d, .e {
    stroke-miterlimit: 10;
  }

  .a, .b, .c {
    stroke-width: 5px;
  }

  .b {
    stroke: #ff8a65;
  }

  .c {
    stroke: #841f03;
  }

  .d {
    fill: #fff;
    stroke: #754c24;
    stroke-width: 2px;
    stroke-dasharray: 7;
  }

  .e {
    stroke: #efefef;
  }

  .f {
    font-size: 18px;
  }

  .g {
    fill: #2ba00a;
  }

  .g, .k {
    font-family: SegoeUI-Italic, Segoe UI;
  }

  .k {
    fill: #ef2525;
    font-style: italic;
  }

  a:hover .a {
    stroke: #ff8a65;
  }

  a:hover .b {
    stroke: #a33614;
  }
</style>
