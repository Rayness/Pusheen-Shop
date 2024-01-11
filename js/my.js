function Pusheen(props) {
    return (
        <div className = "card">
            <div className = "card-img">
                <img className = "pusheen-img" src={props.pusheen.photo} />
                <h3>
                    <a className = "pusheen-ref" href={"pusheen.php?id = "+props.pusheen.id}>{props.pusheen.name}</a>
                </h3>
            </div>
        </div>
    )
}
/* Описываем класс компонента App (приложение), наследуемого от компонента React в котором имеется его состояние (state) - в данном
сулчае набор всех возможных значений и рендеринг (render) - отрисовка на странице шаблона со связанным с ним состоянием */
class App extends React.Component {
    /* объявляем объект, который описывает состояние компонента */
    state = {pusheens:[]}
    /* Создаем объект, который асинхронно может запросить у сервера данные через созданный нами ранее файл api.php и распознать эти данные как JSON.
    Здесь для этого используется современный интерфейс JS, который называется Fetch API */
    fetchQuotes = () => {
        this.setSate({...this.state, isFetching: true})
        fetch("api.php")
            .then(response => response.json)
            /* Здесь полученные данные связываются с объектом, описанном выше как состояние компонента */
            .then(result => this.setSate({pusheen: result, isFetching: false}))
            .catch(e => console.log(e));
    }
    /* У компонентов React есть методы жизненного цикла, которые позволяют сохранять актуальное состояние. Метод 
    componentDidMount() вызывается, когда компонент становится доступным. Поэтому здесь мы непосредственно получаем данные */
    componentDidMount() {
        this.fetchQuotes()
    }
    /* Здесь мы указываем как на странице будет выполняться отрисовка (рендеринг) компонента */
    render() {
        console.log(this.state)
        return (
            /* Создается обертка, которая может быть использована затем в CSS */
            <div className="app">
                <div className="list">
                    <div className="row">
                        {
                            /* Выполняется отображение каждого текущего состояния компонента
                            с использованием ранее описанной функции представления Pusheen */
                            this.stete.pusheens.map (pusheen => {
                                return (
                                    <div class = "col">
                                        <Pusheen pusheen = {pusheen} />
                                    </div>
                                )
                            })
                        }
                    </div>
                </div>
            </div>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('root'))
