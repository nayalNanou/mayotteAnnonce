<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>My page</title>
        <style>
            .planet {
                height: 200px;
                width: 200px;
            }
        </style>
    </head>

    <body>
        <h1>Hello world</h1>

        <!-- <img class="planet" src="https://pluspng.com/img-png/planet-png-hd--1049.png" alt="planet" /> -->

        <script>
            class Planet {
                constructor(element, degree = 0, speed = 0.1, radius = 100, originY = 100, originX = 100) {
                    this.element = element;
                    this.degree = parseInt(degree, 10);
                    this.speed = parseFloat(speed, 10);
                    this.radius = parseInt(radius, 10);
                    this.originX = parseInt(originX, 10);
                    this.originY = parseInt(originY, 10);

                    this.element.style.position = 'absolute';
                }

                rotate() {
                    if (this.degree >= 360) {
                        this.degree = 0;
                    } else if (this.degree < 0) {
                        this.degree = 360;
                    }

                    this.degree = this.degree + this.speed;

                    const radians = this.degree * (Math.PI / 180);

                    const topPosition = (Math.sin(radians) * this.radius) + this.originY;
                    const leftPosition = (Math.cos(radians) * this.radius) + this.originX;

                    this.element.style.top = topPosition + 'px';
                    this.element.style.left = leftPosition + 'px';

                    window.requestAnimationFrame(this.rotate.bind(this));
                }
            }

            const imgPlanets = document.querySelectorAll('.planet');

            for (const imgPlanet of imgPlanets) {
                const planet = new Planet(imgPlanet, 0, 0.1, 200, 300, 300);
                planet.rotate();
            }
        </script>
    </body>
</html>
