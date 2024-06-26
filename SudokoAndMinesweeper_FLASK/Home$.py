from flask import Flask, render_template, request
from classsudoku import * 
from classmineasweeper import *
global user1 
user1 = Minesweeper()
user = Sudoku()
app = Flask(__name__)
@app.route('/')
@app.route('/<name>/<id>/<level>', methods=['POST', 'GET'])
def home(name="", id="", level=""):
    if name == "Sudoku":
        r = 1
        if user.n == 2 :
            user.restart()
            user.n = 0
        if user.n == 0:
            user.Insert_id(id)
            user.Insert_level(level)
            user.n = 1
        if request.method == 'POST': 
            if 'nb' in request.form:
                r = request.form['nb']
            else:
                r = request.form['l'][2]
            if 'l' in request.form:   
                x = eval(request.form['l'][0])
                y = eval(request.form['l'][1])
                user.Insertion_into_arrays(x, y, r)
        user.change_nb_pipe()
        if user.end_nb():
            r = "0" 
        user.victory()  
        return render_template('Sudoku.html',n=user.n,id=user.id, lis=user.puzzle, r=r, lisc=user.colors, sol=user.sol, p=user.array_of_pipe)
@app.route('/Minesweeper/<id>/<level>',methods=['POST', 'GET'])    
def minesweeper_route(level = "", id = ""):
    global user1
    if user1.n == 3 :
        user1.restart()
        user1.n = 0
    if user1.n == 0:
            user1.Insert_level(eval(level))
            user1.id = id
            user1.n = 1
    if user1.g_o == 0:
        if request.method == 'POST':
            if "bomb_emoji" in request.form:
                user1.change_bomb_emoji()
            if "l" in request.form and user1.bomb_emoji == "💣":
                if request.form['l'][2] == "4":
                    x = eval(request.form['l'][0])
                    y = eval(request.form['l'][1])
                    user1.Insert_v_inv(x,y)
                else :
                    x = eval(request.form['l'][0])
                    y1 = request.form['l'][1]
                    y2 = request.form['l'][2]
                    y = eval((y1+y2))
                    user1.Insert_v_inv(x,y)
                user1.game_over(x,y)
            elif "l" in request.form and user1.bomb_emoji == "🚩":
                if request.form['l'][2] == "4":
                    x = eval(request.form['l'][0])
                    y = eval(request.form['l'][1])
                    user1.Insert_flag(x,y)
                else :
                    x = eval(request.form['l'][0])
                    y1 = request.form['l'][1]
                    y2 = request.form['l'][2]
                    y = eval((y1+y2))
                    user1.Insert_flag(x,y)
                user1.nb_of_bomb()
        user1.victory()
    return render_template('Minesweeper.html',id = user1.id,n = user1.g_o,array_game=user1.v_inv,array = user1.array ,colors = user1.colors,bomb_emoji=user1.bomb_emoji,flag=user1.flag,nb_bomb=user1.nb_bomb_t)
if __name__ == '__main__':
    app.run(debug=True)
