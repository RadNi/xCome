import time
import unittest

from selenium import webdriver

from test_utility import static_data
from test_utility import fields


class Boss(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=boss", "password=bossboss",
                                                    "submit"])[2].click()
        self.driver.get(static_data.base_url + "profile/users-table")

    def test_boss_activate_users(self):
        self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')[0]. \
            find_elements_by_tag_name('td')[13].find_element_by_tag_name('button').click()
        self.driver.get(static_data.base_url + "profile/users-table")
        user_condition = \
            self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')[0].find_elements_by_tag_name(
                'td')[9].text
        assert user_condition is "1"

    def test_boss_deactivate_users(self):
        self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')[0]. \
            find_elements_by_tag_name('td')[14].find_element_by_tag_name('button').click()
        self.driver.get(static_data.base_url + "profile/users-table")
        user_condition = \
            self.driver.find_element_by_tag_name('tbody').find_elements_by_tag_name('tr')[0].find_elements_by_tag_name(
                'td')[9].text
        assert user_condition is "0"

    def tearDown(self):
        self.driver.close()
