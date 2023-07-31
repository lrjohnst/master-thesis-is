from scipy import stats

def mann_whitney_test(data1, data2):
    test_statistic, p_value = stats.mannwhitneyu(data1, data2, alternative='two-sided')
    return test_statistic, p_value

data1 = [1,2,1,1,3,2,2,2,1,1,2]
data2 = [4,2,1,2,1,2,2,1,3,3,2,3,2,3,3,1,2,1,1,2,1,3,3,2,2]
test_stat, p_value = mann_whitney_test(data1, data2)
r_value = test_stat / (len(data1) * len(data2))
print("\ndata1:")
print(stats.describe(data1))
print("\ndata2:")
print(stats.describe(data2))

# https://doi.org/10.1177/1536867X1201200202 Ronan M. Conroy
# conroy_set_0 = [5, 5, 5, 5, 5, 5, 7, 8, 9, 10]
# conroy_set_1 = [1, 2, 3, 4, 5, 5, 5, 5, 5, 5]
# test_stat, p_value = mann_whitney_test(conroy_set_0, conroy_set_1)
# r_value = test_stat / (len(conroy_set_0) * len(conroy_set_1))
# print("\nConroy Set 0:")
# print(stats.describe(conroy_set_0))
# print("\nConroy Set 1:")
# print(stats.describe(conroy_set_1))

# Means are very different
# try_set_a = [4, 3, 2, 3, 4, 2, 5, 3, 4, 2, 3, 4, 5, 3, 4, 2, 4, 5, 3, 4]
# try_set_b = [1, 1, 2, 1, 1, 2, 1, 2, 1, 1, 2, 1, 1, 2, 1, 2, 1, 1, 2, 1]
# U-value: 386.00000000
# p-value: 0.00000022
# r-value: 0.96500000

# Means are somewhat different
# try_set_a = [3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5]
# try_set_b = [1, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 5]
# U-value: 312.00000000
# p-value: 0.00178101
# r-value: 0.78000000

# Means are slightly different
# try_set_a = [3, 3, 3, 3, 2, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4]
# try_set_b = [5, 3, 2, 2, 2, 4, 3, 3, 5, 6, 4, 3, 3, 3, 3, 4, 3, 3, 3, 3]
# U-value: 268.00000000
# p-value: 0.04837838
# r-value: 0.67000000

# Means for which the difference is not statistically significant
# try_set_a = [3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4]
# try_set_b = [2, 2, 2, 4, 2, 3, 5, 3, 3, 5, 3, 3, 6, 5, 3, 4, 4, 3, 3, 3]
# U-value: 260.00000000
# p-value: 0.08355513
# r-value: 0.65000000

# Means are fairly similar
# try_set_a = [3, 3, 3, 3, 2, 2, 3, 3, 3, 3, 3, 3, 2, 2, 3, 3, 3, 3, 3, 3]
# try_set_b = [2.8, 2.9, 2.75, 2.8, 3.2, 3.1, 2.5, 2.1, 2.99, 3.33, 3.01, 2.98, 2.85, 3.04, 2.6, 2.7, 2.8, 2.9, 2.95, 2.91]
# U-value: 240.00000000
# p-value: 0.26911167
# r-value: 0.60000000

# test_stat, p_value = mann_whitney_test(try_set_a, try_set_b)
# r_value = test_stat / (len(try_set_a) * len(try_set_b))
# print("\nTry Set a:")
# print(stats.describe(try_set_a))
# print("\nTry Set b:")
# print(stats.describe(try_set_b))

# Format the numbers without scientific notation
test_stat_formatted = "{:.8f}".format(test_stat)
p_value_formatted = "{:.8f}".format(p_value)
r_value_formatted = "{:.8f}".format(r_value)

print("\nResults Mann-Whitney:")
print("U-value:", test_stat_formatted)
print("p-value:", p_value_formatted)
print("r-value:", r_value_formatted)
