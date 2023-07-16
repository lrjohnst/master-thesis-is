from scipy import stats

def mann_whitney_test(data1, data2):
    """
    Performs the Mann-Whitney U test for comparing the means of two variables.

    Parameters:
        data1 (array-like): The first dataset.
        data2 (array-like): The second dataset.

    Returns:
        (float, float): The test statistic and p-value.
    """
    test_statistic, p_value = stats.mannwhitneyu(data1, data2, alternative='two-sided')
    return test_statistic, p_value



data1 = [1,2,1,1,3,2,2,2,1,1,2
]
data2 = [4,2,1,2,1,2,2,1,3,3,2,3,2,3,3,1,2,1,1,2,1,3,3,2,2
]

test_stat, p_value = mann_whitney_test(data1, data2)

# Format the numbers without scientific notation
test_stat_formatted = "{:.8f}".format(test_stat)
p_value_formatted = "{:.8f}".format(p_value)

print("Test statistic:", test_stat_formatted)
print("P-value:", p_value_formatted)