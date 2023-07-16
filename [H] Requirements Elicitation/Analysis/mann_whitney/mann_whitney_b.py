from scipy import stats
import csv

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

# Example usage
data_sets = [
    {
        's_behavior_more_speed': [1,2,3,3,2,3,3,1,1,1,2,4,1,2,2,1,1,2,1,2,1,1,2,2,2,1],
        'i_behavior_more_speed': [1,1,2,2,1,2,2,4,1,3,2,3,3,1]
    },
    {
        's_behavior_less_speed': [3,1,4,2,1,4,3,3,1,2,2,4,3,2,4,4,1,2,3,3,1,3,4,4,3,3],
        'i_behavior_less_speed': [2,2,2,2,3,4,3,3,2,3,2,3,3,2]
    },
    {
        's_behavior_speed_control': [2,2,4,2,1,4,1,2,1,1,2,4,1,2,1,2,1,2,1,2,2,2,4,2,4,1],
        'i_behavior_speed_control': [2,1,2,3,3,3,3,4,2,3,2,3,3,1]
    },
    {
        's_behavior_lane_position': [2,3,3,3,2,4,2,2,2,2,2,4,2,3,3,2,2,3,2,3,2,1,3,4,4,2],
        'i_behavior_lane_position': [2,2,2,3,3,3,3,3,1,3,3,2,1,2],
    },
    {
        's_behavior_reaction_time': [4,3,2,3,2,3,3,2,1,2,3,4,2,2,3,4,2,3,3,3,2,3,3,3,3,2],
        'i_behavior_reaction_time': [3,2,2,2,3,3,3,2,1,3,3,2,2,2],
    },
    {
        's_behavior_wrong_turns': [4,3,4,3,4,2,1,3,1,2,1,4,1,2,4,5,3,4,2,3,1,3,4,4,3,2],
        'i_behavior_wrong_turns': [2,2,3,3,4,3,2,3,2,1,3,3,3,1],
    },
    {
        's_behavior_operating_errors': [2,1,3,3,2,2,3,1,1,1,2,1,2,2,3,2,1,1,2,2,1,2,3,2,2,2],
        'i_behavior_operating_errors': [3,2,2,1,1,2,2,3,1,1,2,1,2,1],
    },



    {
        'i_behavior_more_speed': [1,1,2,2,1,2,2,4,1,3,2,3,3,1],
        'z_behavior_more_speed': [2,1,1,2,2,2,1,2,1,1,1],
    },
    {
        'i_behavior_less_speed': [2,2,2,2,3,4,3,3,2,3,2,3,3,2],
        'z_behavior_less_speed': [4,1,1,1,2,3,1,3,1,5,2],
    },
    {
        'i_behavior_speed_control': [2,1,2,3,3,3,3,4,2,3,2,3,3,1],
        'z_behavior_speed_control': [4,2,1,1,2,2,1,3,2,1,3],
    },
    {
        'i_behavior_lane_position': [2,2,2,3,3,3,3,3,1,3,3,2,1,2],
        'z_behavior_lane_position': [4,2,1,1,3,2,1,2,2,2,3],
    },
    {
        'i_behavior_reaction_time': [3,2,2,2,3,3,3,2,1,3,3,2,2,2],
        'z_behavior_reaction_time': [1,2,1,1,4,3,1,2,3,4,2],
    },
    {
        'i_behavior_wrong_turns': [2,2,3,3,4,3,2,3,2,1,3,3,3,1],
        'z_behavior_wrong_turns': [2,1,1,1,4,1,3,3,2,1,3],
    },
    {
        'i_behavior_operating_errors': [3,2,2,1,1,2,2,3,1,1,2,1,2,1],
        'z_behavior_operating_errors': [3,1,1,1,3,1,1,2,1,1,2],
    },



    {
        'z_behavior_more_speed': [2,1,1,2,2,2,1,2,1,1,1],
        's_behavior_more_speed': [1,2,3,3,2,3,3,1,1,1,2,4,1,2,2,1,1,2,1,2,1,1,2,2,2,1],
    },
    {
        'z_behavior_less_speed': [4,1,1,1,2,3,1,3,1,5,2],
        's_behavior_less_speed': [3,1,4,2,1,4,3,3,1,2,2,4,3,2,4,4,1,2,3,3,1,3,4,4,3,3],
    },
    {
        'z_behavior_speed_control': [4,2,1,1,2,2,1,3,2,1,3],
        's_behavior_speed_control': [2,2,4,2,1,4,1,2,1,1,2,4,1,2,1,2,1,2,1,2,2,2,4,2,4,1],
    },
    {
        'z_behavior_lane_position': [4,2,1,1,3,2,1,2,2,2,3],
        's_behavior_lane_position': [2,3,3,3,2,4,2,2,2,2,2,4,2,3,3,2,2,3,2,3,2,1,3,4,4,2],
    },
    {
        'z_behavior_reaction_time': [1,2,1,1,4,3,1,2,3,4,2],
        's_behavior_reaction_time': [4,3,2,3,2,3,3,2,1,2,3,4,2,2,3,4,2,3,3,3,2,3,3,3,3,2],
    },
    {
        'z_behavior_wrong_turns': [2,1,1,1,4,1,3,3,2,1,3],
        's_behavior_wrong_turns': [4,3,4,3,4,2,1,3,1,2,1,4,1,2,4,5,3,4,2,3,1,3,4,4,3,2],
    },
    {
        'z_behavior_operating_errors': [3,1,1,1,3,1,1,2,1,1,2],
        's_behavior_operating_errors': [2,1,3,3,2,2,3,1,1,1,2,1,2,2,3,2,1,1,2,2,1,2,3,2,2,2],
    },
]



# data1 = []
# data2 = []
#
# test_stat, p_value = mann_whitney_test(data1, data2)
#
# # Format the numbers without scientific notation
# test_stat_formatted = "{:.8f}".format(test_stat)
# p_value_formatted = "{:.8f}".format(p_value)
#
# print("Test statistic:", test_stat_formatted)
# print("P-value:", p_value_formatted)


# Open a file in write mode and create a CSV writer
with open('output.csv', 'w', newline='') as file:
    writer = csv.writer(file)

    # Write the header row
    writer.writerow(['test', 'p'])

    # Loop over the sets
    for data_set in data_sets:

        # Get the subsets from the data_set dictionary
        subsets = list(data_set.values())

        # Ensure that there are exactly two subsets in the set
        if len(subsets) == 2:
            subset1, subset2 = subsets

            # Do M-W tests
            test_stat, p_value = mann_whitney_test(subset1, subset2)

            # Format the numbers without scientific notation
            test_stat_formatted = "{:.8f}".format(test_stat)
            p_value_formatted = "{:.8f}".format(p_value)



            # Write the row to the CSV file
            keys = list(data_set.keys())
            test_name = keys[0] + " vs. " + keys[1]
            writer.writerow([test_name, p_value_formatted])
            # print(keys[0], "vs.", keys[1])
            # print("Test statistic:", test_stat_formatted)
            # print("P-value:", p_value_formatted)
