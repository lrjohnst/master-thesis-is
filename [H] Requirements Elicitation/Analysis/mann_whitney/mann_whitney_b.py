from scipy import stats
import csv
from statistics import mean

def mann_whitney_test(data1, data2):
    test_statistic, p_value = stats.mannwhitneyu(data1, data2, alternative='two-sided')
    return test_statistic, p_value



## DISTRACTION ##
data_sets = [
    {
        's_distraction_manual': [2,2,1,2,1,3,3,1,2,1,1,2,2,4,1,2,2,3,1,2,3,3,1,1,3,2,3,3],
        'i_distraction_manual': [2,1,2,1,1,2,2,3,3,1,2,2,1,1,2,2]
    },
    {
        's_distraction_awareness': [4,3,3,4,3,4,3,2,2,1,2,2,3,4,1,3,3,2,2,3,2,2,2,2,3,2,4,2],
        'i_distraction_awareness': [2,2,2,2,1,2,2,3,2,2,3,1,3,3,2,1]
    },
    {
        's_distraction_shift_focus': [2,1,2,2,1,3,3,2,2,1,1,1,2,4,1,2,3,3,3,2,2,2,2,1,4,3,2,2],
        'i_distraction_shift_focus': [2,1,2,1,2,2,3,2,2,1,2,1,2,2,2,2]
    },
    {
        's_distraction_mental_load': [2,2,2,3,1,3,1,2,2,1,1,1,3,2,1,2,2,1,1,1,1,2,2,2,3,3,2,1],
        'i_distraction_mental_load': [2,1,2,1,1,2,2,2,1,1,1,1,3,2,2,1]
    },
    {
        's_distraction_glance_frequency': [2,3,2,2,1,3,3,2,2,1,1,2,2,2,2,2,4,2,3,3,4,2,1,1,3,2,3,2],
        'i_distraction_glance_frequency': [2,1,2,2,1,3,3,2,2,1,2,2,2,3,2,2]
    },
    {
        's_distraction_glance_duration': [3,1,2,2,2,3,4,2,3,2,1,1,2,2,2,2,3,3,2,2,3,3,2,1,2,4,2,3],
        'i_distraction_glance_duration': [3,1,2,2,2,3,3,2,2,1,2,2,3,3,3,2]
    },



    {
        'i_distraction_manual': [2,1,2,1,1,2,2,3,3,1,2,2,1,1,2,2],
        'z_distraction_manual': [2,1,1,1,3,1,1,2,1,3,4,3,3]
    },
    {
        'i_distraction_awareness': [2,2,2,2,1,2,2,3,2,2,3,1,3,3,2,1],
        'z_distraction_awareness': [2,1,1,2,4,2,1,3,3,5,4,2,2]
    },
    {
        'i_distraction_shift_focus': [2,1,2,1,2,2,3,2,2,1,2,1,2,2,2,2],
        'z_distraction_shift_focus': [2,1,1,1,4,2,2,2,2,3,4,3,2]
    },
    {
        'i_distraction_mental_load': [2,1,2,1,1,2,2,2,1,1,1,1,3,2,2,1],
        'z_distraction_mental_load': [2,1,1,2,4,2,1,2,1,3,1,2,2]
    },
    {
        'i_distraction_glance_frequency': [2,1,2,2,1,3,3,2,2,1,2,2,2,3,2,2],
        'z_distraction_glance_frequency': [4,1,1,1,3,1,1,2,3,3,3,3,2]
    },
    {
        'i_distraction_glance_duration': [3,1,2,2,2,3,3,2,2,1,2,2,3,3,3,2],
        'z_distraction_glance_duration': [4,2,1,1,4,2,1,1,1,4,3,2,3]
    },



    {
        'z_distraction_manual': [2,1,1,1,3,1,1,2,1,3,4,3,3],
        's_distraction_manual': [2,2,1,2,1,3,3,1,2,1,1,2,2,4,1,2,2,3,1,2,3,3,1,1,3,2,3,3]
    },
    {
        'z_distraction_awareness': [2,1,1,2,4,2,1,3,3,5,4,2,2],
        's_distraction_awareness': [4,3,3,4,3,4,3,2,2,1,2,2,3,4,1,3,3,2,2,3,2,2,2,2,3,2,4,2]
    },
    {
        'z_distraction_shift_focus': [2,1,1,1,4,2,2,2,2,3,4,3,2],
        's_distraction_shift_focus': [2,1,2,2,1,3,3,2,2,1,1,1,2,4,1,2,3,3,3,2,2,2,2,1,4,3,2,2]
    },
    {
        'z_distraction_mental_load': [2,1,1,2,4,2,1,2,1,3,1,2,2],
        's_distraction_mental_load': [2,2,2,3,1,3,1,2,2,1,1,1,3,2,1,2,2,1,1,1,1,2,2,2,3,3,2,1]
    },
    {
        'z_distraction_glance_frequency': [4,1,1,1,3,1,1,2,3,3,3,3,2],
        's_distraction_glance_frequency': [2,3,2,2,1,3,3,2,2,1,1,2,2,2,2,2,4,2,3,3,4,2,1,1,3,2,3,2]
    },
    {
        'z_distraction_glance_duration': [4,2,1,1,4,2,1,1,1,4,3,2,3],
        's_distraction_glance_duration': [3,1,2,2,2,3,4,2,3,2,1,1,2,2,2,2,3,3,2,2,3,3,2,1,2,4,2,3]
    },
]





## BEHAVIOR ##
# data_sets = [
#     {
#         's_behavior_more_speed': [1,2,3,3,2,3,3,1,1,1,2,4,1,2,2,1,1,2,1,2,1,1,2,2,2,1],
#         'i_behavior_more_speed': [1,1,2,2,1,2,2,4,1,3,2,3,3,1]
#     },
#     {
#         's_behavior_less_speed': [3,1,4,2,1,4,3,3,1,2,2,4,3,2,4,4,1,2,3,3,1,3,4,4,3,3],
#         'i_behavior_less_speed': [2,2,2,2,3,4,3,3,2,3,2,3,3,2]
#     },
#     {
#         's_behavior_speed_control': [2,2,4,2,1,4,1,2,1,1,2,4,1,2,1,2,1,2,1,2,2,2,4,2,4,1],
#         'i_behavior_speed_control': [2,1,2,3,3,3,3,4,2,3,2,3,3,1]
#     },
#     {
#         's_behavior_lane_position': [2,3,3,3,2,4,2,2,2,2,2,4,2,3,3,2,2,3,2,3,2,1,3,4,4,2],
#         'i_behavior_lane_position': [2,2,2,3,3,3,3,3,1,3,3,2,1,2],
#     },
#     {
#         's_behavior_reaction_time': [4,3,2,3,2,3,3,2,1,2,3,4,2,2,3,4,2,3,3,3,2,3,3,3,3,2],
#         'i_behavior_reaction_time': [3,2,2,2,3,3,3,2,1,3,3,2,2,2],
#     },
#     {
#         's_behavior_wrong_turns': [4,3,4,3,4,2,1,3,1,2,1,4,1,2,4,5,3,4,2,3,1,3,4,4,3,2],
#         'i_behavior_wrong_turns': [2,2,3,3,4,3,2,3,2,1,3,3,3,1],
#     },
#     {
#         's_behavior_operating_errors': [2,1,3,3,2,2,3,1,1,1,2,1,2,2,3,2,1,1,2,2,1,2,3,2,2,2],
#         'i_behavior_operating_errors': [3,2,2,1,1,2,2,3,1,1,2,1,2,1],
#     },



    # {
    #     'i_behavior_more_speed': [1,1,2,2,1,2,2,4,1,3,2,3,3,1],
    #     'z_behavior_more_speed': [2,1,1,2,2,2,1,2,1,1,1],
    # },
    # {
    #     'i_behavior_less_speed': [2,2,2,2,3,4,3,3,2,3,2,3,3,2],
    #     'z_behavior_less_speed': [4,1,1,1,2,3,1,3,1,5,2],
    # },
    # {
    #     'i_behavior_speed_control': [2,1,2,3,3,3,3,4,2,3,2,3,3,1],
    #     'z_behavior_speed_control': [4,2,1,1,2,2,1,3,2,1,3],
    # },
    # {
    #     'i_behavior_lane_position': [2,2,2,3,3,3,3,3,1,3,3,2,1,2],
    #     'z_behavior_lane_position': [4,2,1,1,3,2,1,2,2,2,3],
    # },
    # {
    #     'i_behavior_reaction_time': [3,2,2,2,3,3,3,2,1,3,3,2,2,2],
    #     'z_behavior_reaction_time': [1,2,1,1,4,3,1,2,3,4,2],
    # },
    # {
    #     'i_behavior_wrong_turns': [2,2,3,3,4,3,2,3,2,1,3,3,3,1],
    #     'z_behavior_wrong_turns': [2,1,1,1,4,1,3,3,2,1,3],
    # },
    # {
    #     'i_behavior_operating_errors': [3,2,2,1,1,2,2,3,1,1,2,1,2,1],
    #     'z_behavior_operating_errors': [3,1,1,1,3,1,1,2,1,1,2],
    # },



#     {
#         'z_behavior_more_speed': [2,1,1,2,2,2,1,2,1,1,1],
#         's_behavior_more_speed': [1,2,3,3,2,3,3,1,1,1,2,4,1,2,2,1,1,2,1,2,1,1,2,2,2,1],
#     },
#     {
#         'z_behavior_less_speed': [4,1,1,1,2,3,1,3,1,5,2],
#         's_behavior_less_speed': [3,1,4,2,1,4,3,3,1,2,2,4,3,2,4,4,1,2,3,3,1,3,4,4,3,3],
#     },
#     {
#         'z_behavior_speed_control': [4,2,1,1,2,2,1,3,2,1,3],
#         's_behavior_speed_control': [2,2,4,2,1,4,1,2,1,1,2,4,1,2,1,2,1,2,1,2,2,2,4,2,4,1],
#     },
#     {
#         'z_behavior_lane_position': [4,2,1,1,3,2,1,2,2,2,3],
#         's_behavior_lane_position': [2,3,3,3,2,4,2,2,2,2,2,4,2,3,3,2,2,3,2,3,2,1,3,4,4,2],
#     },
#     {
#         'z_behavior_reaction_time': [1,2,1,1,4,3,1,2,3,4,2],
#         's_behavior_reaction_time': [4,3,2,3,2,3,3,2,1,2,3,4,2,2,3,4,2,3,3,3,2,3,3,3,3,2],
#     },
#     {
#         'z_behavior_wrong_turns': [2,1,1,1,4,1,3,3,2,1,3],
#         's_behavior_wrong_turns': [4,3,4,3,4,2,1,3,1,2,1,4,1,2,4,5,3,4,2,3,1,3,4,4,3,2],
#     },
#     {
#         'z_behavior_operating_errors': [3,1,1,1,3,1,1,2,1,1,2],
#         's_behavior_operating_errors': [2,1,3,3,2,2,3,1,1,1,2,1,2,2,3,2,1,1,2,2,1,2,3,2,2,2],
#     },
# ]

# Open a file in write mode and create a CSV writer
with open('output.csv', 'w', newline='') as file:
    writer = csv.writer(file)

    # Write the header row
    writer.writerow(['test', 'n_1', 'n_2', 'diff',  'U', 'r', 'p'])

    # Loop over the sets
    for data_set in data_sets:

        # Get the subsets from the data_set dictionary
        subsets = list(data_set.values())

        # Ensure that there are exactly two subsets in the set
        if len(subsets) == 2:
            subset1, subset2 = subsets

            # Do M-W tests
            test_stat, p_value = mann_whitney_test(subset1, subset2)

            n_1 = len(subset1)
            n_2 = len(subset2)
            effect_size = abs(1 - ((2 * test_stat) / (n_1 * n_2))) # Use absolute value cause we're not so interested yet in the direction
            mean_diff = abs(mean(subset1) - mean(subset2)) # Use absolute value cause we're not so interested yet in the direction

            # Format the numbers without scientific notation
            test_stat_formatted = "{:.8f}".format(test_stat)
            r_value_formatted = "{:.8f}".format(effect_size)
            p_value_formatted = "{:.8f}".format(p_value)
            mean_diff_formatted = "{:.8f}".format(mean_diff)

            # Write the row to the CSV file
            keys = list(data_set.keys())
            test_name = keys[0] + " vs. " + keys[1]
            writer.writerow([test_name, n_1, n_2, mean_diff_formatted, test_stat_formatted, r_value_formatted, p_value_formatted])
            print("\n\n", keys[0], "vs.", keys[1])
            print("Test statistic:", test_stat_formatted)
            print("r-value:", r_value_formatted)
            print("p-value:", p_value_formatted)
            print("Mean diff:", mean_diff_formatted)
