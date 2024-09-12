@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENCUESTA ! SENA </title>
    <link rel="stylesheet" href="{{asset('assets/css/stylesEncuesta.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="inter">
            <header class="content">
                <h1> ENCUESTA DE HABILIDADES | APRENDIZ </h1>
            </header>
        </div>

        <form>
            <section class="sub-titulo">
                <section>
                    <!-- <h3> ENCUESTA | APRENDIZ</h3> -->
                     <br>
                </section>

                <div class="form">
                    <section>
                        <form id="formulario2" style="display: none;">
                            <section class="form-group">
                                <div class="form-content">
                                    <label for="q1">GESTIÓN DE TIEMPO</label>
                                    <p>Manejar el tiempo de manera efectiva, entregar pendientes durante los plazos requeridos y cumplir con horarios impulsa la productividad personal, colectiva y ayuda a la persona a destacar entre los demás individuos.</p>
                                    <!-- <p>A continuación califica del 1 al 5 tu percepción de esta competencia en ti:</p> -->
                                    
                                    <div class="rating">
                                        <span class="rating-numbers">
                                          <span>1</span>
                                          <span>2</span>
                                          <span>3</span>
                                          <span>4</span>
                                          <span>5</span>
                                        </span>
                                        <span class="rating-circles">
                                          <input type="radio" id="rating1-1" name="rating-1" value="1">
                                          <label for="rating1-1"></label>
                                          <input type="radio" id="rating1-2" name="rating-1" value="2">
                                          <label for="rating1-2"></label>
                                          <input type="radio" id="rating1-3" name="rating-1" value="3">
                                          <label for="rating1-3"></label>
                                          <input type="radio" id="rating1-4" name="rating-1" value="4">
                                          <label for="rating1-4"></label>
                                          <input type="radio" id="rating1-5" name="rating-1" value="5">
                                          <label for="rating1-5"></label>
                                        </span>
                                    </div>
                                </div>
                            </section>
                            <div class="separador"></div>
                            <section class="form-group">
                                <div>
                                    <label for="q3">LIDERAZGO</label>
                                    <p>Saber manejar un equipo de trabajo, sacar su mayor rendimiento, haciéndoles creer en un proyecto y manteniéndolos motivados es fundamental para una persona que aspira al éxito.</p>
                                    <!-- <p>A continuación califica de menor a mayor tu percepción de esta competencia en ti:</p> -->
                                    <div class="rating">
                                        <span class="rating-numbers">
                                          <span>1</span>
                                          <span>2</span>
                                          <span>3</span>
                                          <span>4</span>
                                          <span>5</span>
                                        </span>
                                        <span class="rating-circles">
                                          <input type="radio" id="rating2-1" name="rating-2" value="1">
                                          <label for="rating2-1"></label>
                                          <input type="radio" id="rating2-2" name="rating-2" value="2">
                                          <label for="rating2-2"></label>
                                          <input type="radio" id="rating2-3" name="rating-2" value="3">
                                          <label for="rating2-3"></label>
                                          <input type="radio" id="rating2-4" name="rating-2" value="4">
                                          <label for="rating2-4"></label>
                                          <input type="radio" id="rating2-5" name="rating-2" value="5">
                                          <label for="rating2-5"></label>
                                        </span>
                                    </div>
                                </div>      
                            </section>   

                            <div class="separador"></div>

                            <section class="form-group">
                                <div>
                                    <label for="q4">TOMA DE DECISIONES</label>
                                    <p>Saber tomar decisiones bajo presión y evitar el uso emocional en momentos de presión representa una personalidad fuerte y profesional, un candidato digno de convertirse en líder.</p>
                                    <!-- <p>A continuación califica de menor a mayor tu percepción de esta competencia en ti:</p> -->
                        
                                    <div class="rating">
                                        <span class="rating-numbers">
                                          <span>1</span>
                                          <span>2</span>
                                          <span>3</span>
                                          <span>4</span>
                                          <span>5</span>
                                        </span>
                                        <span class="rating-circles">
                                          <input type="radio" id="rating3-1" name="rating-3" value="1">
                                          <label for="rating3-1"></label>
                                          <input type="radio" id="rating3-2" name="rating-3" value="2">
                                          <label for="rating3-2"></label>
                                          <input type="radio" id="rating3-3" name="rating-3" value="3">
                                          <label for="rating3-3"></label>
                                          <input type="radio" id="rating3-4" name="rating-3" value="4">
                                          <label for="rating3-4"></label>
                                          <input type="radio" id="rating3-5" name="rating-3" value="5">
                                          <label for="rating3-5"></label>
                                        </span>
                                    </div>
                                </div>
                            </section>

                            <div class="separador"></div>

                            <section class="form-group">
                                <div>
                                    <label for="q5">TRABAJO EN EQUIPO</label>
                                    <p>Aunque no es poca la cantidad de individuos a los que les desagrada la idea de realizar una tarea con otros individuos, es fundamental tener buenas relaciones con los equipos de trabajo. Ayuda al desarrollo de tareas de manera más efectiva y crea un ambiente comunicativo más tranquilo.</p>
                                    <!-- <p>A continuación califica de menor a mayor tu percepción de esta competencia en ti:</p> -->
                        
                                    <div class="rating">
                                        <span class="rating-numbers">
                                          <span>1</span>
                                          <span>2</span>
                                          <span>3</span>
                                          <span>4</span>
                                          <span>5</span>
                                        </span>
                                        <span class="rating-circles">
                                          <input type="radio" id="rating4-1" name="rating-4" value="1">
                                          <label for="rating4-1"></label>
                                          <input type="radio" id="rating4-2" name="rating-4" value="2">
                                          <label for="rating4-2"></label>
                                          <input type="radio" id="rating4-3" name="rating-4" value="3">
                                          <label for="rating4-3"></label>
                                          <input type="radio" id="rating4-4" name="rating-4" value="4">
                                          <label for="rating4-4"></label>
                                          <input type="radio" id="rating4-5" name="rating-4" value="5">
                                          <label for="rating4-5"></label>
                                        </span>
                                    </div>
                                </div>
                            </section>
                
                            <div class="separador"></div>

                            <section class="form-group">
                                <div>
                                    <label for="q6">HABILIDADES DE COMUNICACIÓN</label>
                                    <p>La comunicación verbal, no verbal y escrita son vitales, más aún en entornos donde conviven diferentes culturas y generaciones. Un trabajo con buena comunicación tiene mayor probabilidad de evitar conflictos o malentendidos.</p>
                                    <!-- <p>A continuación califica de menor a mayor tu percepción de esta competencia en ti:</p> -->
                                    <div class="rating">
                                        <span class="rating-numbers">
                                          <span>1</span>
                                          <span>2</span>
                                          <span>3</span>
                                          <span>4</span>
                                          <span>5</span>
                                        </span>
                                        <span class="rating-circles">
                                          <input type="radio" id="rating5-1" name="rating-5" value="1">
                                          <label for="rating5-1"></label>
                                          <input type="radio" id="rating5-2" name="rating-5" value="2">
                                          <label for="rating5-2"></label>
                                          <input type="radio" id="rating5-3" name="rating-5" value="3">
                                          <label for="rating5-3"></label>
                                          <input type="radio" id="rating5-4" name="rating-5" value="4">
                                          <label for="rating5-4"></label>
                                          <input type="radio" id="rating5-5" name="rating-5" value="5">
                                          <label for="rating5-5"></label>
                                        </span>
                                    </div>
                                </div>
                            </section>

                            <div class="separador"></div>
                
                            <section class="form-group">
                                <div>
                                    <label for="q7">RESILIENCIA</label>
                                    <p>La capacidad para afrontar las adversidades y salir fortalecido de ellas, haciendo gala de una gran perseverancia, es clave para sacar adelante aquellos proyectos que tienden a complicarse.</p>
                                    <!-- <p>A continuación califica de menor a mayor tu percepción de esta competencia en ti:</p> -->
                        
                                    <div class="rating">
                                        <span class="rating-numbers">
                                          <span>1</span>
                                          <span>2</span>
                                          <span>3</span>
                                          <span>4</span>
                                          <span>5</span>
                                        </span>
                                        <span class="rating-circles">
                                          <input type="radio" id="rating6-1" name="rating-6" value="1">
                                          <label for="rating6-1"></label>
                                          <input type="radio" id="rating6-2" name="rating-6" value="2">
                                          <label for="rating6-2"></label>
                                          <input type="radio" id="rating6-3" name="rating-6" value="3">
                                          <label for="rating6-3"></label>
                                          <input type="radio" id="rating6-4" name="rating-6" value="4">
                                          <label for="rating6-4"></label>
                                          <input type="radio" id="rating6-5" name="rating-6" value="5">
                                          <label for="rating6-5"></label>
                                        </span>
                                    </div>
                                </div>
                            </section>
                            
                            <div class="separador"></div>   
                
                            <section class="form-group">
                                <div>
                                    <label for="q8">INNOVACIÓN Y CREATIVIDAD</label>
                                    <p>Las personas creativas poseen mayor probabilidad de obtener un cargo importante. No hay nada más emocionante que la aparición de ideas frescas y novedosas; es una de las habilidades blandas más solicitadas por el mercado.</p>
                                    <!-- <p>A continuación califica de menor a mayor tu percepción de esta competencia en ti:</p> -->
                        
                                    <div class="rating">
                                        <span class="rating-numbers">
                                          <span>1</span>
                                          <span>2</span>
                                          <span>3</span>
                                          <span>4</span>
                                          <span>5</span>
                                        </span>
                                        <span class="rating-circles">
                                          <input type="radio" id="rating7-1" name="rating-7" value="1">
                                          <label for="rating7-1"></label>
                                          <input type="radio" id="rating7-2" name="rating-7" value="2">
                                          <label for="rating7-2"></label>
                                          <input type="radio" id="rating7-3" name="rating-7" value="3">
                                          <label for="rating7-3"></label>
                                          <input type="radio" id="rating7-4" name="rating-7" value="4">
                                          <label for="rating7-4"></label>
                                          <input type="radio" id="rating7-5" name="rating-7" value="5">
                                          <label for="rating7-5"></label>
                                        </span>
                                    </div>
                                    
                                    
                                </div>
                            </section>

                            <section class="form-button">
                                <div>
                                    <a type="submit" class="submit-button">Guardar</a>
                                </div>
                            </section>
                        </form>
                    </section>
                </div> 
            </section>
        </form>        
    </div>
</body>
</html>
@endsection