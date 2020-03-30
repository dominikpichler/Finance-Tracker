import numpy as np
import sys
import json



def estimate_coef(x, y):
    # number of observations/points
    n = np.size(x)

    # mean of x and y vector
    m_x, m_y = np.mean(x), np.mean(y)

    # calculating cross-deviation and deviation about x
    SS_xy = np.sum(y * x) - n * m_y * m_x
    SS_xx = np.sum(x * x) - n * m_x * m_x

    # calculating regression coefficients
    b_1 = SS_xy / SS_xx
    b_0 = m_y - b_1 * m_x

    return (b_0, b_1)


def main():


    #loadData from PHP
    try:
        data = json.loads(sys.argv[1])
    except:
        print("hallo")


    # observations
    x = np.array([0, 1, 2, 3, 4, 5, 6, 7, 8, 9])
    y = np.array([1, 3, 2, 5, 7, 8, 8, 9, 10, 12])

    # estimating coefficients
    b = estimate_coef(x, y)
    # print('Estimated coefficients:\nb_0 = {} \ \nb_1 = {}'.format(b[0], b[1]))

    # calculating y_reg
    y_reg = x * b[1] + b[0]
    print('Y_reg')
    print(y_reg)
    # plotting regression line


    result = {'status': 'Yes!'}
    print(result)
    print(json.dumps(result))




if __name__ == "__main__":
    main()
