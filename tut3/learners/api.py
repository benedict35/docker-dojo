from flask import Flask
from flask_restful import Resource, Api

app = Flask(__name__)
api = Api(app)

class Learners(Resource):
    def get(self):
        return {
                'learners': ['Ezra',
                             'Bryn',
                             'DP',
                             'Jose']
                }
api.add_resource(Learners, '/')

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80, debug=True)
