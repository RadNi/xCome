import time
import unittest
from asyncio import sleep

from selenium import webdriver

from test_utility import static_data
from test_utility import fields


class Clerk(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.driver.get(static_data.base_url + "login")
        fields.get_components_by_name(self.driver, ["username=clerk", "password=testtest",
                                                    "submit"])[2].click()

    def test_clerk_verification_accept(self):
        num_of_columns = len(self.driver.find_element_by_id("unchecked-trans-table").find_element_by_tag_name(
            'tbody').find_elements_by_tag_name('tr'))
        tds = self.driver.find_element_by_id("unchecked-trans-table").find_element_by_tag_name(
            'tbody').find_elements_by_tag_name('tr')[0].find_elements_by_tag_name('button')
        tds[0].click()
        self.driver.get(self.driver.current_url)
        new_num_of_columns = len(self.driver.find_element_by_id("unchecked-trans-table").find_element_by_tag_name(
            'tbody').find_elements_by_tag_name('tr'))
        assert num_of_columns - new_num_of_columns is 1

    def test_clerk_verification_reject(self):
        num_of_columns = len(self.driver.find_element_by_id("unchecked-trans-table").find_element_by_tag_name(
            'tbody').find_elements_by_tag_name('tr'))
        tds = self.driver.find_element_by_id("unchecked-trans-table").find_element_by_tag_name(
            'tbody').find_elements_by_tag_name('tr')[0].find_elements_by_tag_name('button')
        tds[1].click()
        self.driver.get(self.driver.current_url)
        new_num_of_columns = len(self.driver.find_element_by_id("unchecked-trans-table").find_element_by_tag_name(
            'tbody').find_elements_by_tag_name('tr'))
        assert num_of_columns - new_num_of_columns is 1

    def tearDown(self):
        self.driver.close()
